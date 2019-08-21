$(function() {
  const csrfToken = $('meta[name="csrf-token"]').attr("content");
  const votesCollection = [];

  // get
  $("#get-data-button").on("click", function() {
    getVotes();
  });

  const getVotes = function() {
    $.ajax({
      url: "/_api/votes",
      method: "get",
      dataType: "json",
      success: function(response) {
        const res = JSON.stringify(response.votes, null, 2);
        $("#get-result").html(res);
        addUpdateTargets(response.votes);
      },
      error: function(response) {
        console.log(response);
      }
    });
  };

  // init
  getVotes();
  const updateForm = $("#vote-update-form");

  const addUpdateTargets = function(votes) {
    if (votes.length === 0) {
      return false;
    }
    let options = "";
    votesCollection.splice(0, votesCollection.length);
    votes.forEach(vote => {
      votesCollection.push(vote);
      options = options + '<option value="' + vote.id + '">';
      options = options + vote.id + " : " + vote.name;
      options = options + "</option>";
    });

    const firstVoteId = votesCollection[0].id;

    updateForm
      .find('select[name="voteId"]')
      .prop("disabled", false)
      .html(options);

    updateForm
      .find('select[name="voteId"]')
      .val(firstVoteId)
      .trigger("change");
  };

  updateForm.find('select[name="voteId"]').on("change", function() {
    const selectedVoteId = parseInt($(this).val());
    const selectedVotes = votesCollection.filter(function(vote) {
      return vote.id === selectedVoteId;
    });

    if (selectedVotes.length !== 1) {
      return false;
    }

    const selectedVote = selectedVotes[0];

    if (selectedVote.startAt === null) {
      selectedVote.startAt = "";
    }
    if (selectedVote.endAt === null) {
      selectedVote.endAt = "";
    }

    updateForm.find('input[name="voteName"]').val(selectedVote.name);
    updateForm
      .find('input[name="voteDescription"]')
      .val(selectedVote.description);
    updateForm.find('input[name="voteStartAt"]').val(selectedVote.startAt);
    updateForm.find('input[name="voteEndAt"]').val(selectedVote.endAt);
  });

  const createForm = $("#vote-create-form");

  createForm.find(".btn").on("click", function() {
    const votes = [];
    votes.push({
      name: createForm.find('input[name="voteName"]').val(),
      description: createForm.find('input[name="voteDescription"]').val(),
      start_at: createForm.find('input[name="voteStartAt"]').val(),
      end_at: createForm.find('input[name="voteEndAt"]').val()
    });
    createVotes(votes);
  });

  const createVotes = function(votes) {
    const requestData = {
      _token: csrfToken,
      votes: votes
    };

    $.ajax({
      url: "/_api/votes",
      method: "post",
      dataType: "json",
      data: requestData,
      headers: {
        "X-CSRF-TOKEN": csrfToken
      },
      success: function(data) {
        console.log(data);
      },
      error: function(data) {
        console.log(data);
      }
    });
  };

  // delete
  $("#vote-delete-form")
    .find(".btn")
    .on("click", function() {
      const idsString = $("#delete-target-ids")
        .val()
        .replace(/[^\d\,]/g, "");
      if (idsString === "") {
        return false;
      }
      const ids = idsString.split(",").map(function(id) {
        return parseInt(id);
      });

      deleteVotes(ids);
    });

  const deleteVotes = function(ids) {
    const requestData = {
      _token: csrfToken,
      ids: ids
    };

    $.ajax({
      url: "/_api/votes",
      method: "delete",
      dataType: "json",
      headers: {
        "X-CSRF-TOKEN": csrfToken
      },
      data: requestData,
      success: function(response) {
        const res = JSON.stringify(response.votes, null, 2);
        console.log(res);
        $("#get-result").html(res);
      },
      error: function(response) {
        console.log(response);
      }
    });
  };

  // update button
  updateForm.find(".btn").on("click", function() {
    const votes = [];
    votes.push({
      id: updateForm.find('select[name="voteId"]').val(),
      name: updateForm.find('input[name="voteName"]').val(),
      description: updateForm.find('input[name="voteDescription"]').val(),
      start_at: updateForm.find('input[name="voteStartAt"]').val(),
      end_at: updateForm.find('input[name="voteEndAt"]').val()
    });
    updateVotes(votes);
  });

  const updateVotes = function(votes) {
    const requestData = {
      _token: csrfToken,
      votes: votes
    };

    $.ajax({
      url: "/_api/votes",
      method: "PATCH",
      dataType: "json",
      data: requestData,
      headers: {
        "X-CSRF-TOKEN": csrfToken
      },
      success: function(data) {
        console.log(data);
      },
      error: function(data) {
        console.log(data);
      }
    });
  };
});
