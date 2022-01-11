import React from 'react';
import ReactDom from 'react-dom';
import PageAuthRegister from '@resources/components/page/auth/register/index';

const $element = document.getElementById('react-registerForm');

ReactDom.render(
  <React.StrictMode>
    <PageAuthRegister {...$element.dataset} />
  </React.StrictMode>,
  $element
);
