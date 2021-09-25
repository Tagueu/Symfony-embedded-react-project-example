/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
const domTable = document.getElementById('myReactTable');
class DomTable extends React.Component {

    constructor(props) {
        super(props);

    }
    render() {
        return (
                <div>
                    <h2> hello world </h2>
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