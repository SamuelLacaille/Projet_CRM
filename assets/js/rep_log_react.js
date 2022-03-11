import React from 'react';
import { render } from 'react-dom';
import Home from "./components/Home/Home";
import Menu from "./components/Global/Menu";

import { library } from '@fortawesome/fontawesome-svg-core'
import {
    faArrowRightFromBracket,
    faBars,
    faBuilding,
    faTableColumns,
    faUser,
    faUsers
} from '@fortawesome/free-solid-svg-icons'

library.add(faBars, faTableColumns, faUser, faUsers, faBuilding, faArrowRightFromBracket)

const heart = true;

render(
    <Menu/>,
    document.getElementById('test')
);