import React from 'react';
import PropTypes from 'prop-types';

class PageAuthLogin extends React.Component {
  render() {
    return (
      <p>resources\components\page\auth\login\index.jsx
        <br />{this.props.actionUrl}
        <br />{this.props.csrfToken}
      </p>
    );
  }
}

PageAuthLogin.propTypes = {
  actionUrl: PropTypes.string,
  csrfToken: PropTypes.string
};

export default PageAuthLogin;
