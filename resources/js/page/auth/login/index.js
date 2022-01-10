import React from 'react';
import ReactDom from 'react-dom';
import PageAuthLogin from '@resources/components/page/auth/login/index';

const $element = document.getElementById('react-loginForm');

ReactDom.render(
  <React.StrictMode>
    <PageAuthLogin {...$element.dataset} />
  </React.StrictMode>,
  $element
);
