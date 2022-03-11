import React, { Component } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import '../../menu';
import logo from '../../../imgs/wp.svg';

export default class Home extends Component {
    render() {
        return (
            <div id="body-pd">
                <header className="header" id="header">
                    <div className="header_toggle">
                        <FontAwesomeIcon id="header-toggle" icon="fa-solid fa-bars" />
                    </div>
                    {/*<div className="header_img"><img src="https://i.imgur.com/bt0bP22.png" alt=""></img></div>*/}
                </header>
                <div className="l-navbar" id="nav-bar">
                    <nav className="nav">
                        <div>
                            <a href="#" className="nav_logo">
                                <img id="logo" src={logo} alt="logo WebPartner"/>
                                <span className="nav_logo-name">Web<span className="text-yellow">Partner</span></span>
                            </a>
                            <div className="nav_list">
                                <a href="#" className="nav_link active">
                                    <FontAwesomeIcon icon="fa-solid fa-table-columns" />
                                    <span className="nav_name">Dashboard</span>
                                </a>
                                <a href="#" className="nav_link">
                                    <FontAwesomeIcon icon="fas fa-building" />
                                    <span className="nav_name">Clients</span> </a>
                                <a href="#" className="nav_link">
                                    <FontAwesomeIcon icon="fas fa-users" />
                                    <span className="nav_name">Prospects</span> </a>
                                <a href="#" className="nav_link">
                                    <FontAwesomeIcon icon="fas fa-user" />
                                    <span className="nav_name">Employés</span>
                                </a>
                            </div>
                        </div>
                        <a href="#" className="nav_link">
                            <FontAwesomeIcon icon="fa-solid fa-arrow-right-from-bracket" />
                            <span className="nav_name">Déconnexion</span>
                        </a>
                    </nav>
                </div>
            </div>
        );
    }
}