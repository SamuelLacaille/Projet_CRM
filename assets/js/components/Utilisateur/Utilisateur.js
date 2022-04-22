import React, { Component } from 'react';
import Menu from "../Global/Menu";
const active = '';

export default class Utilisateur extends Component {
    render() {
        return (
            <div>
                <Menu role='' active={active}/>
                <h1 className="pt-3 pb-3"></h1>
            </div>

        );
    }
}