import React, { Component } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

export default class Home extends Component {
    render() {
        return (
            <div>
                <table className="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Entreprise</th>
                        <th scope="col">Email</th>
                        <th scope="col">Créé le</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <FontAwesomeIcon icon="fas fa-ellipsis-v" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>
                            <FontAwesomeIcon icon="fas fa-ellipsis-v" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colSpan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        <td>
                            <FontAwesomeIcon icon="fas fa-ellipsis-v" />
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        );
    }
}