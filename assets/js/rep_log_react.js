import React from 'react';
import { render } from 'react-dom';
import Home from "./components/Home/Home";
import Utilisateur from "./components/Utilisateur/Utilisateur";
import Menu from "./components/Global/Menu";

import { library } from '@fortawesome/fontawesome-svg-core'
import {
    faArrowRightFromBracket,
    faBars,
    faBuilding,
    faCrown,
    faEllipsisV,
    faTableColumns,
    faUser,
    faUsers
} from '@fortawesome/free-solid-svg-icons'

library.add(faBars, faTableColumns, faUser, faUsers, faBuilding, faArrowRightFromBracket, faCrown, faEllipsisV)

const role = 'Admin';

if (document.getElementById('home')) {
    render(
        <Home role={role}/>,
        document.getElementById('home')
    );
}
if (document.getElementById('utilisateur')) {
    render(
        <Utilisateur role={role}/>,
        document.getElementById('utilisateur')
    );
}
if (document.getElementById('menu')) {
    render(
        <Menu role={role}/>,
        document.getElementById('menu')
    );
}