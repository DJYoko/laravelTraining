$(function() {

  const csrfToken = $('meta[name="csrf-token"]').attr('content');

  // get
  $('#get-data-button').on('click', function() {
    $.ajax({
      url: '/_api/votes',
      method: 'get',
      dataType: 'json',
      success: function(response) {
          const res = JSON.stringify(response.votes, null, 2);
          console.log(res);
          $('#get-result').html(res);
      },
      error: function(response) {
        console.log(response);
      }
    });
  });

  const createForm = $('#vote-create-form');

  createForm.find('.btn').on('click', function() {
    createVotes();
  });

  const createVotes = function() {
    const requestData = {
      _token: csrfToken,
      votes: []
    };

    requestData.votes[0] = {
      name: 'sample1 name',
      description: 'sample1 description'
    };
    requestData.votes[1] = {
      name: 'sample2 name',
      description: 'sample2 description',
      start_at: '2019-08-20 12:00:00',
      end_at: '2019-09-20 12:00:00'
    };

    console.log(requestData);

    $.ajax({
      url: '/_api/votes',
      method: 'post',
      dataType: 'json',
      data: requestData,
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      success: function(data) {
        console.log(data);
      },
      error: function(data) {
        console.log(data);
      }
    });
  };

  const deleteForm = $('#vote-delete-form');
  deleteForm.find('.btn').on('click', function() {
      const idsString = $('#delete-target-ids').val().replace(/[^\d\,]/g, '');
      if (idsString === '') {
          return false;
      }
      const ids = idsString.split(',').map(function(id){
          return parseInt(id);
      });

      const requestData = {
          _token: csrfToken,
          ids : ids
      };

    $.ajax({
      url: '/_api/votes',
      method: 'delete',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      data: requestData,
      success: function(response) {
          const res = JSON.stringify(response.votes, null, 2);
          console.log(res);
          $('#get-result').html(res);
      },
      error: function(response) {
        console.log(response);
      }
    });
  });

  const deleteVotes = function() {

  }
});
