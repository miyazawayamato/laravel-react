import React from 'react';
import {Link} from 'react-router-dom';

const GlobalNav = () => {
    return(
        <nav>
            <ul>
                <Link to="/spasite/public">
                    <li>Top</li>
                </Link>
                <Link to="/spasite/public/day">
                    <li>About</li>
                </Link>
            </ul>
        </nav>
    )
}

export default GlobalNav;