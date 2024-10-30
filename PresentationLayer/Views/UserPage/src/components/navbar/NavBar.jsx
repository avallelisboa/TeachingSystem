import React, { useState } from 'react'
import { Link } from 'react-router-dom';

const NavBar = () => {
    const [isNavBarCollapsed, setIsNavBarCollapsed] = useState(true);

    return (
        <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
            <button className="navbar-toggler" onClick={()=>setIsNavBarCollapsed(!isNavBarCollapsed)} type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>
            <aside className={`${isNavBarCollapsed ? 'collapse' : ''}navbar-collapse`} id="navbarNav">
                <ul>
                    <li>
                        <Link to="/">Menu Principal</Link>
                    </li>
                    <li>
                        <Link to="/">Alumno</Link>
                    </li>
                    <li>
                        <Link to="/">Docente</Link>
                    </li>
                    <li>
                        <Link to="/">Configuracion</Link>
                    </li>
                </ul>
            </aside>
        </nav>
    )
}

export default NavBar