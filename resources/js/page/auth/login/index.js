import React from 'react';
import ReactDom from 'react-dom';
import PageAuthLogin from '@resources/components/page/auth/login/index';

ReactDom.render(
  <React.StrictMode>
    <PageAuthLogin />
  </React.StrictMode>,
  document.getElementById('app')
);
