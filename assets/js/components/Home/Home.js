import React, { Component } from 'react';

export default class Home extends Component {
    render() {
        let heart = '';
        if (this.props.heart) {
            heart = <span>❤️ </span>;
        };
        return (
            <h2>Test {heart}</h2>
        );
    }
}