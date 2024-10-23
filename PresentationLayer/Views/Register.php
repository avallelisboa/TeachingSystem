<!DOCTYPE html>
<html lang="es">
<?php require_once("./PresentationLayer/Views/Shared/head.php") ?>
<body>
<?php require_once("./PresentationLayer/Views/Shared/header.php") ?>
<main class="container">
    <section class="row justify-content-center">
        <h2 class="col-12 text-center">Registrarse</h2>
        <form class="col-12 col-sm-10 col-md-8 container-fluid" id="registerForm" method="POST" action="/register">
            <!-- User Name -->
            <fieldset class="form-group">
                <label for="userName">Usuario</label>
                <input type="text" class="form-control" id="userName" name="userName" minlength="4" maxlength="12"required
                    onkeyup="validateUserName()"
                    placeholder="Ingrese su usuario">
                <p class="alert alert-danger" id="userNameErrorMessage" style="display: none;">El nombre debe tener entre 4 y 12 caracteres</p>
            </fieldset>
        
            <!-- First Name -->
            <fieldset class="form-group">
                <label for="firstName">Nombre</label>
                <input type="text" class="form-control" id="firstName" name="firstName" minlength="4" maxlength="20" required
                    required pattern="[A-Za-z]+" onkeyup="validateFirstName()"
                    placeholder="Enter your first name">
                <p class="alert alert-danger" id="firstNameErrorMessage" style="display: none;">El nombre debe tener entre 4 y 20 caracteres y sólo puede contener letras.</p>
            </fieldset>

            <!-- Last Name -->
            <fieldset class="form-group">
                <label for="lastName">Apellido</label>
                <input type="text" class="form-control" id="lastName" name="lastName" 
                    required pattern="[A-Za-z]+" minlength="4" maxlength="30" required
                    placeholder="Enter your last name" onkeyup="validateLastName()">
                <p class="alert alert-danger" id="lastNameErrorMessage" style="display: none;">El apellido debe tener entre 4 y 30 caracteres y sólo puede contener letras.</p>
            </fieldset>

            <!-- Email -->
            <fieldset class="form-group">
                <label for="email">Email</label>
                <input type="email" minlength="5" maxlength="50" required class="form-control" id="email" name="email" 
                    required placeholder="Enter your email" onkeyup="validateEmail()">
                <p class="alert alert-danger" id="emailErrorMessage" style="display: none;">El mail debe tener entre 5 y 50 caracteres y ser un mail válido</p>
            </fieldset>

            <!-- Password -->
            <fieldset class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" 
                    required minlength="6" maxlength="50" required onkeyup="validatePassword()"
                    placeholder="Enter your password">
                <p class="alert alert-danger" id="passwordErrorMessage" style="display: none;">La contraseña debe tener entre 6 y 50 caracteres.</p>
            </fieldset>

            <!-- Verify Password -->
            <fieldset class="form-group">
                <label for="verifyPassword">Confirmar contraseña</label>
                <input type="password" class="form-control" id="verifyPassword" 
                    placeholder="Verify your password"  minlength="6" maxlength="50" required onkeyup="validateVerifyPassword()">
                <p id="verifyPasswordErrorMessage" class="alert alert-danger" style="display:none;">Las contraseñas no coinciden</p>
            </fieldset>

            <!-- Submit Button -->
            <fieldset class="row justify-content-start">
                <input type="submit" id="submitFormButton" class="ml-3 btn btn-primary btn-block col-6 col-sm-5 col-md-4" value="Register"/>
            </fieldset>

            <fieldset>
                <br>
                <?php 
                    if(isset($_COOKIE["registerErrorMessage"])){
                        echo "<p class=\"alert alert-danger\">".$_COOKIE["registerErrorMessage"]."</>";
                    }
                ?>
            </fieldset>
        </form>
        <p id="response" class="mt-3"></p>
    </section>
</main>
<script>
    function validateUserName(){
        var userName = document.getElementById("userName");
        var userNameErrorMessageField = document.getElementById("userNameErrorMessage");
        
        userName.reportValidity();
        if(userName.validity.tooLong || userName.validity.tooShort){
            userNameErrorMessageField.style.display = "block";
        }else {
            userNameErrorMessageField.style.display = "none";
        }
    }
    function validateFirstName(){
        var name = document.getElementById("firstName");
        var nameErrorMessageField = document.getElementById("firstNameErrorMessage");
        var submitFormButton = document.getElementById("submitFormButton");
        
        name.reportValidity();
        if(name.validity.tooLong || name.validity.tooShort){
            nameErrorMessageField.style.display = "block";
        }else {
            nameErrorMessageField.style.display = "none";
        }
    }
    function validateLastName(){
        var lastName = document.getElementById("lastName");
        var lastNameErrorMessageField = document.getElementById("lastNameErrorMessage");
        var submitFormButton = document.getElementById("submitFormButton");
        
        lastName.reportValidity();
        if(lastName.validity.tooLong || lastName.validity.tooShort){
            lastNameErrorMessageField.style.display = "block";
        }else {
            lastNameErrorMessageField.style.display = "none";
        }
    }
    function validateEmail(){
        var email = document.getElementById("email");
        var emailErrorMessageField = document.getElementById("emailErrorMessage");
        var submitFormButton = document.getElementById("submitFormButton");
        
        email.reportValidity();
        if(email.validity.tooLong || email.validity.tooShort || email.validity.typeMismatch){
            emailErrorMessageField.style.display = "block";
        }else {
            emailErrorMessageField.style.display = "none";
        }
    }
    function validatePassword(){
        var password = document.getElementById("password");
        var passwordErrorMessageField = document.getElementById("passwordErrorMessage");
        
        password.reportValidity();
        if(password.validity.tooLong || password.validity.tooShort){
            passwordErrorMessageField.style.display = "block";
        }else {
            passwordErrorMessageField.style.display = "none";
        }
    }
    function validateVerifyPassword(){
        var password = document.getElementById("password").value;
        var verifyPassword = document.getElementById("verifyPassword").value;
        var verifyPasswordErrorMessageField = document.getElementById("verifyPasswordErrorMessage");
        var submitFormButton = document.getElementById("submitFormButton");
        
        if(password != verifyPassword){
            verifyPasswordErrorMessageField.style.display = "block";
            submitFormButton.disabled = true;
        }else {
            verifyPasswordErrorMessageField.style.display = "none";
            submitFormButton.disabled = false;
        }
    }
</script>
</body>
</html>