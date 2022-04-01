import React from 'react';
import { render } from 'react-dom';
import Menu from "./components/Global/Menu";

import { library } from '@fortawesome/fontawesome-svg-core'
import {
    faArrowRightFromBracket,
    faBars,
    faBuilding, faCrown,
    faTableColumns,
    faUser,
    faUsers
} from '@fortawesome/free-solid-svg-icons'

library.add(faBars, faTableColumns, faUser, faUsers, faBuilding, faArrowRightFromBracket, faCrown)

const role = 'Admin';

render(
    <Menu role={role}/>,
    document.getElementById('menu')
);