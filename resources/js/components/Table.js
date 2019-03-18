import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Table extends Component {
    constructor () {
        super()
        this.state = { 
            buildings: []
        }
    }

    componentDidMount () {
        axios.get('/api/buildings').then(response => {
            this.setState({
                buildings: response.data
            })
        })
      }
    render() {
        const { buildings } = this.state
        return (
            <table className="table table-hover">
                <thead>
                    <tr>
                        <th>Mã tòa nhà</th>
                        <th>Tên tòa nhà</th>
                        <th>Mô tả</th>
                        <th>Số điện thoại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    {buildings.map(building => (
                    <tr key={building.id}>
                        <td>{building.id}</td>
                        <td>{building.name}</td>
                        <td>{building.description}</td>
                        <td>{building.phone}</td>
                        <td>
                            <button type="button" className="btn btn-info btn-sm btn-rounded btn-fw">
                                <i className="mdi mdi-cloud-download"></i>Edit
                            </button>
                        </td>
                    </tr>
                    ))}
                </tbody>
            </table>
        );
    }
}

if (document.getElementById('table')) {
    ReactDOM.render(<Table />, document.getElementById('table'));
}
