import React, { Component } from 'react';
import '../../menu';

export default class Home extends Component {
    render() {
        return (
            <div id="body-pd">
                <header className="header" id="header">
                    <div className="header_toggle">
                        {/*<i id="header-toggle" className="fa-solid fa-user"></i>*/}
                        <p id="header-toggle">test</p>
                    </div>
                    {/*<div className="header_img"><img src="https://i.imgur.com/bt0bP22.png" alt=""></img></div>*/}
                </header>
                <div className="l-navbar" id="nav-bar">
                    <nav className="nav">
                        <div>
                            <a href="#" className="nav_logo">
                                <i className='bx bx-layer nav_logo-icon'></i>
                                <span className="nav_logo-name">WebPartner</span>
                            </a>
                            <div className="nav_list">
                                <a href="#" className="nav_link active">
                                    <i className='bx bx-grid-alt nav_icon'></i>
                                    <span className="nav_name">Dashboard</span>
                                </a>
                                <a href="#" className="nav_link">
                                    <i className='bx bx-user nav_icon'></i>
                                    <span className="nav_name">Clients</span> </a>
                                <a href="#" className="nav_link">
                                    <i className='bx bx-message-square-detail nav_icon'></i>
                                    <span className="nav_name">Prospects</span> </a>
                                <a href="#" className="nav_link">
                                    <i className='bx bx-bookmark nav_icon'></i>
                                    <span className="nav_name">Employés</span>
                                </a>
                            </div>
                        </div>
                        <a href="#" className="nav_link"> <i className='bx bx-log-out nav_icon'></i> <span
                            className="nav_name">SignOut</span> </a>
                    </nav>
                </div>
            </div>
        );
    }
}