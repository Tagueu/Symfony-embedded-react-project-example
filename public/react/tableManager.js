/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
const domTable = document.getElementById('myReactContainer');
class DomTable extends React.Component {

    constructor(props) {
        super(props);
        var editObject={id : null};
        Object.keys(metaData.fields).map((item,idx)=>{
            editObject[item]=null;
        });
        this.state = {
            metaData: metaData,
            page: 1,
            elements: [],
            editObject: editObject
        };
        this.searchElements.bind(this);
        this.submitEditObject.bind(this);
        
    }

    // this method is call after the mounting of the react component
    componentDidMount() {
        this.searchElements();
    }

    searchElements() {
        TableService.getElements((data) => {
            if (data !== null) {
                this.setState({elements: data});
            }
        }, null);
    }
    
    submitEditObject(){
        
    }
    render() {
        return (
                <div>
                    <br/>
                    <center>
                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i> Ajouter </button>
                
                    </center>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nouveau : { metaData.tableTitle }</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="container">
                                            {
                                                Object.keys(this.state.metaData.fields).map((item, idx) => {
                                                    return(
                                        <div class="row">
                                            <div class="col-lg-3">
                                                {this.state.metaData.fields[item].name}
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="{this.state.metaData.fields[item].type}" value="{this.state.editObject[item]}"  class="form-control"/>
                                            </div>
                                            <br/>
                                        </div>

                                                            );
                                                })
                                            }
                
                
                
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div id="myReactTable">
                    </div>
                    <table className="table align-items-center table-flush">
                        <thead className="thead-light">
                            <tr>
                                <th> Id </th>
                                {Object.keys(this.state.metaData.fields).map((item, idx) => {
                                        return (<th>{this.state.metaData.fields[item].name}</th>);
                                    })}
                                <th>Opérations</th>
                            </tr>
                        </thead>
                        <tbody>
                            {this.state.elements.map((item, idx) => {
                                    return (
                                        <tr>
                                            <td>{item['id']} </td>
                                            {Object.keys(this.state.metaData.fields).map((it, id) => {
                                                                return (<td>{item[it]}</td>);
                                                            })}
                            
                                            <td>
                                            <button className="btn btn-sm btn-warning"> <i className="fa fa-eye"></i></button>
                                                <button className="btn btn-sm btn-primary"> <i className="fa fa-pen"></i> </button>
                                                <button className="btn btn-sm btn-danger"> <i className="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                            );
                                })
                            }
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                );
    }
}

if (domTable) {
    try {
        ReactDOM.render(<DomTable />, domTable);
    } catch (error) {
        console.error(error);
    }
}