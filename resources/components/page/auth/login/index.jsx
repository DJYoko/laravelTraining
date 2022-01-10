import React from 'react';
import PropTypes from 'prop-types';

class PageAuthLogin extends React.Component {
  render() {
    return (
      <p>resources\components\page\auth\login\index.jsx
        <br />props.actionUrl {this.props.actionUrl}
        <br />props.csrfToken {this.props.csrfToken}
      </p>
    );
  }
}

PageAuthLogin.propTypes = {
  actionUrl: PropTypes.string,
  csrfToken: PropTypes.string
};

PageAuthLogin.defaultProps = {
  actionUrl: '',
  csrfToken: '',
};

export default PageAuthLogin;
