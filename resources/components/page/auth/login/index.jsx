import React from 'react';
import PropTypes from 'prop-types';

class PageAuthLogin extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      email: '',
      password: '',
    };
  }
  render() {
    return (
      <form action={this.props.actionUrl} method="post">
        <input type="hidden" name="_token" value={this.props.csrfToken} />
        <div className="form-group">
          <label>Email</label>
          <input type="text" className="form-control" name="email" defaultValue={this.state.email} size="30" />
        </div>

        <div className="form-group">
          <label>Password</label>
          <input
            type="password"
            className="form-control"
            name="password"
            defaultValue={this.state.password}
            size="30"
          />
        </div>
        <div className="text-center mt-2">
          <button type="submit" className="btn btn-primary">
            Login
          </button>
        </div>
      </form>
    );
  }
}

PageAuthLogin.propTypes = {
  actionUrl: PropTypes.string,
  csrfToken: PropTypes.string,
};

PageAuthLogin.defaultProps = {
  actionUrl: '',
  csrfToken: '',
};

export default PageAuthLogin;
