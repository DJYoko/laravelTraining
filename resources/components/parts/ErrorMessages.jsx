import React from 'react';
import PropTypes from 'prop-types';

class ErrorMessages extends React.Component {
  render() {
    if (this.props.messages.length === 0) {
      return null;
    }

    return <p className="alert alert-danger">{this.props.messages.join('\n')}</p>;
  }
}

ErrorMessages.propTypes = {
  messages: PropTypes.array,
};

ErrorMessages.defaultProps = {
  messages: [],
};

export default ErrorMessages;
