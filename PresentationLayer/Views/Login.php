<!DOCTYPE html>
<html lang="es">
<?php require_once("./PresentationLayer/Views/Shared/head.php") ?>
<body>
<?php require_once("./PresentationLayer/Views/Shared/header.php") ?>
<main class="container">
    <section class="row justify-content-center">
        <h2 class="col-12 text-center">Iniciar Sesión</h2>
        <form class="col-12 col-sm-10 col-md-8 container-fluid" id="loginForm" method="POST" action="/login">
            <!-- Usuario -->
            <fieldset class="form-group">
                <label for="userName">Usuario</label>
                <input type="text" class="form-control" id="userName" name="userName" 
                        minlength="4"maxlength="12"required onkeyup="validateUser()" placeholder="Ingrese su usuario">
                <p class="alert alert-danger" id="userNameErrorMessage">El usuario debe contener entre 4 y 12 caracteres.</p>
            </fieldset>

            <!-- Password -->
            <fieldset class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" 
                        minlength="6" maxlength="50" required onkeyup="validatePassword()"
                        placeholder="Enter your password">
                <p class="alert alert-danger" id="passwordErrorMessage">La contraseña debe tener entre 6 y 50 caracteres</p>
            </fieldset>

            <!-- Submit Button -->
             <fieldset class="form-group row justify-content-start">
                 <button type="submit" class="ml-3 btn btn-primary btn-block col-6 col-sm-5 col-md-4">Login</button>
             </fieldset>
             <fieldset>
                <?php 
                    if(isset($_COOKIE["loginErrorMessage"])){
                        echo "<p class=\"alert alert-danger\">".$_COOKIE["loginErrorMessage"]."</>";
                    }else if(isset($_COOKIE["registerResultMessage"])){
                        echo "<p class=\"alert alert-success\">".$_COOKIE["registerResultMessage"]."</>";
                    }
                ?>
            </fieldset>
        </form>    

        <p id="response" class="mt-3"></p>
    </section>
    <script>
        function validateUser(){
            var userName = document.getElementById("userName");
            var userNameErrorMessage = document.getElementById("userNameErrorMessage");
            userName.reportValidity();
            if(userName.validity.tooLong || username.validity.tooShort()){
                userNameErrorMessage.dispaly = "block";
            }else{
                userNameErrorMessage.display = "none";
            }
        }
        function validatePassword(){
            var password = document.getElementById("password");
            var passwordErrorMessage = document.getElementById("passwordErrorMessage");
            password.reportValidity();
            if(password.validity.tooLong || password.validity.tooShort()){
                passwordErrorMessage.display = "block";
            }else{
                passwordErrorMessage.dsiplay = "none";
            }
        }
    </script>
</main>
</body>