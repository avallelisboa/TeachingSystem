import React from 'react'
import NavBar from '../navbar/NavBar'

const Configurations = () => {
  return (
    <>
      <section>
        <article>
          <h2>Configuraciones</h2>
        </article>
        <article>
          <h3>Información de la cuenta</h3>
        </article>
        <article>
          <form>
            <legend>Actualizar información de la cuenta</legend>
            <fieldset>
              <label htmlFor="username">Nombre de usuario</label>
              <input type="text" id="username" name="username" required/>
            </fieldset>
            <fieldset>
              <label htmlFor="email">Correo electrónico</label>
              <input type="email" id="email" name="email" required/>
            </fieldset>
            <fieldset>
              <label htmlFor="password">Contraseña</label>
              <input type="password" id="password" name="password" required/>
            </fieldset>
            <fieldset>
              <label htmlFor="confirm_password">Confirmar contraseña</label>
              <input type="password" id="confirm_password" name="confirm_password" required/>
            </fieldset>
            <fieldset>
              <label htmlFor="profile_picture">Foto de perfil</label>
              <input type="file" id="profile_picture" name="profile_picture"/>
            </fieldset>
            <fieldset>
              <label htmlFor="bio">Biografía</label>
              <textarea id="bio" name="bio" rows="4" cols="50"></textarea>
            </fieldset>
            <fieldset>
              <label htmlFor="language">Idioma</label>
              <select id="language" name="language">
                <option value="es">Español</option>
                <option value="en">Inglés</option>
              </select>
            </fieldset>
            <fieldset>
              <label htmlFor="notifications">Notificaciones</label>
              <input type="checkbox" id="notifications" name="notifications"/>
            </fieldset>
            <fieldset>
              <label htmlFor="is_teacher">Activar cuenta de docente</label>
              <input type="checkbox" id="is_teacher" name="is_teacher"/>
            </fieldset>
            <button className="btn btn-primary" type="submit">Actualizar información</button>
          </form>
        </article>
      </section>
    </>
  )
}

export default Configurations