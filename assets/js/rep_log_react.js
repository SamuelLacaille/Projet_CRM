import React from 'react';
import { render } from 'react-dom';
import Home from "./components/Home/Home";

import { library } from '@fortawesome/fontawesome-svg-core'
import {
    faArrowRightFromBracket,
    faBars,
    faBuilding,
    faCrown,
    faTableColumns,
    faUser,
    faUsers
} from '@fortawesome/free-solid-svg-icons'

library.add(faBars, faTableColumns, faUser, faUsers, faBuilding, faArrowRightFromBracket, faCrown)

const role = 'Admin';

render(
    <Home role={role}/>,
    document.getElementById('home')
);

// render(
//     <Table />,
//     document.getElementById('showtable')
// );