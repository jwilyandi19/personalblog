import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import Blog from './components/Blog'

if (document.getElementById('root')) {
    ReactDOM.render(<Blog />, document.getElementById('root'));
}
