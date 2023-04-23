import React from 'react';
import ReactDOM from 'react-dom';


function Create() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">This is my create page</div>

                        {/* <div className="card-body">I'm an example component!x jjjfksdjklfsjlk abc good boy</div> */}
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Create;

if (document.getElementById('create')) {
    ReactDOM.render(<Create />, document.getElementById('create'));
}
