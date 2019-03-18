import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class NewBuilding extends Component {
    constructor () {
        super()
        this.state = {
          name: '',
          description: '',
          phone: ''
        }
        this.handleFieldChange = this.handleFieldChange.bind(this)
        this.handleCreateNewBuilding = this.handleCreateNewBuilding.bind(this)
      }

      handleFieldChange (event) {
        this.setState({
          [event.target.name]: event.target.value
        })
      }

      handleCreateNewBuilding (event) {
        event.preventDefault()


        const building = {
          name: this.state.name,
          description: this.state.description,
          phone: this.state.phone
        }
        axios.post('/api/buildings', building)
          .then(response => {
            console.log(response);
          })
          .catch(error => {
            this.setState({
              errors: error.response.data.errors
            })
          })
      }

    render() {
        return (
                <div className="form-group">
                    <label htmlFor="name" className="col-form-label">Tên tòa nhà:</label>
                    <input type="text" className="form-control" name="name" id="name" value={this.state.name}
                          onChange={this.handleFieldChange} /> 
                </div>
                <div className="form-group">
                    <label htmlFor="phone" className="col-form-label">Số điện thoại:</label>
                    <input type="text" className="form-control" name="phone" id="phone" value={this.state.phone}
                          onChange={this.handleFieldChange} /> 
                </div>
                <div className="form-group">
                    <label htmlFor="description" className="col-form-label">Mô tả:</label> <textarea className="form-control" name="description" id="description" value={this.state.description}
                          onChange={this.handleFieldChange}></textarea> 
                </div>
                <button type="button" onClick={this.handleCreateNewProject} className="btn btn-primary">Thêm</button>
                <button type="button" className="btn btn-light" data-dismiss="modal"> Đóng </button>
        );
    }
}

if (document.getElementById('form-submit')) {
    ReactDOM.render(<NewBuilding />, document.getElementById('form-submit'));
}
