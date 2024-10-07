<!DOCTYPE html>
<html lang="es">
<?php require_once("./PresentationLayer/Views/Shared/head.php") ?>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Login</h2>
    <form id="loginForm" method="POST" action="/login" novalidate>
        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" 
                    required placeholder="Enter your email">
            <div class="invalid-feedback">Please provide a valid email address.</div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" 
                    required minlength="6" 
                    placeholder="Enter your password">
            <div class="invalid-feedback">Password must be at least 6 characters long.</div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <?php 
            if(isset($_COOKIE["loginErrorMessage"])){
                echo "<p class=\"alert alert-danger\">".$_COOKIE["loginErrorMessage"]."</>";
            }
        ?>
    </form>    

    <div id="response" class="mt-3"></div>
    <!-- JavaScript for Custom HTML5 Validation Messages -->
    <script>
        (function() {
            'use strict';
            var form = document.getElementById('loginForm');

            // Set custom validation messages
            form.addEventListener('submit', function(event) {
                // Prevent submission if the form is invalid
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();

                    // Loop over the form controls and apply custom messages
                    var inputs = form.elements;
                    for (var i = 0; i < inputs.length; i++) {
                        if (inputs[i].checkValidity() === false) {
                            setCustomMessage(inputs[i]);
                        }
                    }
                }

                form.classList.add('was-validated');
            }, false);

            // Function to set custom validation messages
            function setCustomMessage(input) {
                // Clear previous message if any
                input.setCustomValidity('');

                // Custom error messages
                if (input.validity.valueMissing) {
                    if (input.name === 'email') {
                        input.setCustomValidity('Please enter your email address.');
                    } else if (input.name === 'password') {
                        input.setCustomValidity('Please enter your password.');
                    }
                } else if (input.validity.typeMismatch) {
                    if (input.type === 'email') {
                        input.setCustomValidity('Please enter a valid email address.');
                    }
                } else if (input.validity.tooShort) {
                    if (input.name === 'password') {
                        input.setCustomValidity('Password must be at least 6 characters long.');
                    }
                }

                // Apply the message to the field if invalid
                input.reportValidity();
            }
        })();
    </script>
</div>
</body>