import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import Blog from './components/Blog'
import { BrowserRouter, Switch, Route } from 'react-router-dom';
import BlogAdd from './components/BlogAdd'

if (document.getElementById('root')) {
    ReactDOM.render(<Blog />, document.getElementById('root'));
}
