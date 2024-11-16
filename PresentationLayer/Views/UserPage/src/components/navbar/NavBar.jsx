import React, { useState } from 'react'
import { Link } from 'react-router-dom';

const NavBar = () => {
    const [isNavBarCollapsed, setIsNavBarCollapsed] = useState(true);

    return (
        <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
            <button className="navbar-toggler" onClick={()=>setIsNavBarCollapsed(!isNavBarCollapsed)} type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>
            <aside className={`row ${isNavBarCollapsed ? 'collapse' : ''} navbar-collapse`} id="navbarNav">
                <ul className="navbar-nav">
                    <li className="nav-item">
                        <Link to="/">Menu Principal</Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/student">Alumno</Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/teacher">Docente</Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/configurations">Configuracion</Link>
                    </li>
                </ul>
            </aside>
        </nav>
    )
}

export default NavBar