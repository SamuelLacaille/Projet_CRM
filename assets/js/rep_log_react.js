import React from 'react';
import { render } from 'react-dom';
import Home from "./components/Home/Home";
import Menu from "./components/Global/Menu";

const heart = true;

render(
    <Menu/>,
    document.getElementById('test')
);