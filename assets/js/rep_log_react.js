import React from 'react';
import { render } from 'react-dom';
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

render(
    <Menu/>,
    document.getElementById('menu')
);