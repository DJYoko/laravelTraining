import React from 'react';
import PropTypes from 'prop-types';
import ErrorMessages from '@resources/components/parts/ErrorMessages';

class PageAuthRegister extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      name: '',
      email: '',
      password: '',
      passwordConfirmation: '',
    };
  }
  render() {
    return (
      <form action={this.props.actionUrl} method="post">
        <input type="hidden" name="_token" value={this.props.csrfToken} />
        <div className="form-group">
          <label>UserName</label>
          <input type="text" name="name" size="30" className="form-control" defaultValue={this.props.name} />
          <ErrorMessages messages={this.getErrorMessageByKey('name')}></ErrorMessages>
        </div>
        <div className="form-group">
          <label>Email</label>
          <input type="text" name="email" size="30" className="form-control" defaultValue={this.props.email} />
          <ErrorMessages messages={this.getErrorMessageByKey('email')}></ErrorMessages>
        </div>

        <div className="form-group">
          <label>Password</label>
          <input
            type="password"
            name="password"
            size="30"
            className="form-control"
            defaultValue={this.props.password}
          />
          <ErrorMessages messages={this.getErrorMessageByKey('password')}></ErrorMessages>
        </div>

        <div className="form-group">
          <label>Password Confirmation</label>
          <input type="password" name="password_confirmation" size="30" className="form-control" />
        </div>
        <div class="text-center">
          <button type="submit" value="send" class="btn btn-primary">
            Register
          </button>
        </div>
      </form>
    );
  }
  getErrorMessageByKey(key) {
    const messages = JSON.parse(this.props.errorMessages);
    console.log(messages[key], key);
    if (typeof messages[key] === 'undefined') {
      return [];
    }
    return messages[key];
  }
}

PageAuthRegister.propTypes = {
  actionUrl: PropTypes.string,
  csrfToken: PropTypes.string,
  name: PropTypes.string,
  email: PropTypes.string,
  errorMessages: PropTypes.string,
};

PageAuthRegister.defaultProps = {
  actionUrl: '',
  csrfToken: '',
  name: '',
  email: '',
  errorMessages: {},
};

export default PageAuthRegister;
