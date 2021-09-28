/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
const domTable = document.getElementById('myReactContainer');
class DomTable extends React.Component {

    constructor(props) {
        super(props);
        var editObject = {id: null};
        Object.keys(metaData.fields).map((item, idx) => {
            editObject[item] = null;
        });
        this.state = {
            metaData: metaData,
            page: 1,
            elements: [],
            editObject: editObject,
            deleteId:null,
            watchMode:false
        };
        this.searchElements.bind(this);
        this.submitEditObject.bind(this);
        this.handleInputFieldChange.bind(this);
        this.setAnEditObject.bind(this);
        this.deleteAnObject.bind(this);

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

    handleInputFieldChange(event, reactComponent, item) {
        var edit = reactComponent.state.editObject;
        edit[item] = event.target.value;
        reactComponent.setState({editObject: edit});
    }
    submitEditObject(reactComponent) {
        console.log(reactComponent.state.editObject);
        TableService.editElement((data) => {
            if (data !== null) {
                //we update the table
                this.searchElements();
            }
        }, reactComponent.state.editObject);

    }
    setAnEditObject(reactComponent, Id) {
        var edit = reactComponent.state.editObject;
        reactComponent.setState({watchMode:false}); //to allow editing
        if (Id === null) {
            var editnew = {id: ''};
            Object.keys(reactComponent.state.metaData.fields).map((item, idx) => {
                editnew[item] = '';
            });
            reactComponent.setState({editObject: null});
            reactComponent.setState({editObject: editnew});
            console.log('state setted');
        } else {
            edit['id'] = Id;
            reactComponent.setState({editObject: edit});
            TableService.getElements((data) => {
                if (data !== null) {
                    reactComponent.setState({editObject: data[0]});
                }
            }, {id: Id});
        }
    }
    
    deleteAnObject(reactComponent,id){
        TableService.deleteElement((data)=>{
            if (data !== null) {
                //we update the table
                reactComponent.searchElements();
            }
        },{id : id});
    }
    render() {
        return (
                <div>
                    <br/>
                    <center>
                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal" onClick={(e) => {
                                this.setAnEditObject(this, null);
                                    }}> <i class="fa fa-plus"></i> Ajouter </button>
                
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
                                            <input type="hidden" name="id" value={this.state.editObject['id']} onChange={(e) => {
                                                    this.handleInputFieldChange(e, this, 'id');
                                                       }} />
                                            {
                                                Object.keys(this.state.metaData.fields).map((item, idx) => {
                                                    return(
                                        <div class="row">
                                            <div class="col-lg-3">
                                                {this.state.metaData.fields[item].name}
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="{this.state.metaData.fields[item].type}" disabled={this.state.watchMode} value={this.state.editObject[item]} onChange={(e) => {
                                                                                    this.handleInputFieldChange(e, this, item);
                                                                                       }} class="form-control"/>
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
                                    {(!this.state.watchMode)?
                                    (
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" onClick={(e) => {
                                            this.submitEditObject(this);
                                                }}>Enregistrer</button>
                                    ):
                                    (null)
                                    }
                                    
                                    
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
                                                <button className="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal" onClick={(e)=>{this.setAnEditObject(this, item['id']);this.setState({watchMode:true});}}> <i className="fa fa-eye"></i></button>
                                                <button className="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" onClick={(e) => {
                                                                    this.setAnEditObject(this, item['id']);
                                                                        }}> <i className="fa fa-pen"></i> </button>
                                                <button className="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onClick={(e)=>{this.setState({deleteId:item['id']});}}> <i className="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                            );
                                })
                            }
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                    <div id="forDeletion">
                        <div class="modal" tabindex="-1" role="dialog" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id='deleteModalLabel'>Suppression d'un élement</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Etes vous sure de vouloir supprimer l'élement d'identifiant {this.state.deleteId} ? </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" onClick={(e)=>{this.deleteAnObject(this,this.state.deleteId);}}>Confirmer</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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