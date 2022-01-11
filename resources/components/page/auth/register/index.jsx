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
        resources\components\page\auth\register\index.jsx
        <input type="hidden" name="_token" value={this.props.csrfToken} />
      </form>
    );
  }
}

PageAuthRegister.propTypes = {
  actionUrl: PropTypes.string,
  csrfToken: PropTypes.string,
};

PageAuthRegister.defaultProps = {
  actionUrl: '',
  csrfToken: '',
};

export default PageAuthRegister;
