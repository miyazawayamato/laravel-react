import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import Top from './Top';
import EachDay from './EachDay';
import Twitter from './Twitter';

const App = () => {
    return(
        <BrowserRouter>
        <React.Fragment>
            
            <div className="half">
                <Switch>
                    <Route path="/spasite/public" exact component={Top} /> 
                    <Route path="/spasite/public/day" component={EachDay} />
                </Switch>
                <Twitter />
            </div>
        </React.Fragment>
        </BrowserRouter>
    )
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}