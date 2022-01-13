import React from 'react';
import PropTypes from 'prop-types';

class PageAuthRegister extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
    };
  }
  render() {
    return (
      <form action={this.props.actionUrl} method="post">
        <input type="hidden" name="_token" value={this.props.csrfToken} />
        <div className="list-group">
          <div className="list-group-item">
            UserName
            <input
              type="text"
              name="name"
              size="30"
              defaultValue={this.props.name}
            />
            <p className="alert alert-danger">
              {this.getErrorMessageByKey('name').join('\n')}
            </p>
          </div>
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
  errorMessages: PropTypes.string,
};

PageAuthRegister.defaultProps = {
  actionUrl: '',
  csrfToken: '',
  errorMessages: {},
};

export default PageAuthRegister;
