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
        <div className="list-group mb-2">
          <div className="list-group-item">
            Email
            <input type="text" name="email" defaultValue={this.state.email} size="30" />
          </div>

          <div className="list-group-item">
            Password
            <input type="text" name="password" defaultValue={this.state.password} size="30" />
          </div>
        </div>
        <div className="text-center">
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
