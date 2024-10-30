import React from 'react'
import NavBar from '../navbar/NavBar'

const UserMainMenu = () => {
  return (
    <>
        <NavBar/>
        <section>
          <article>
            <h2>Enlaces de clases grabadas</h2>
          </article>
          <article>
            <h2>Clases para pendientes</h2>
          </article>
          <article>
            <h2>Calendario</h2>
          </article>
        </section>
    </>
  )
}

export default UserMainMenu