<!DOCTYPE html>
<html lang="es">
<?php require_once("./PresentationLayer/Views/Shared/head.php") ?>
<body>
<main class="container">
    <section class="row justify-content-center">
        <h2 class="col-12 text-center">Register</h2>
        <form class="col-12 col-sm-10 col-md-8 container-fluid" id="registerForm" method="POST" action="/register" novalidate>
            <!-- First Name -->
            <fieldset class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" 
                    required pattern="[A-Za-z]+" 
                    placeholder="Enter your first name">
                <p class="invalid-feedback">Please provide a valid first name.</p>
            </fieldset>

            <!-- Last Name -->
            <fieldset class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" 
                    required pattern="[A-Za-z]+" 
                    placeholder="Enter your last name">
                <p class="invalid-feedback">Please provide a valid last name.</p>
            </fieldset>

            <!-- Email -->
            <fieldset class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                    required placeholder="Enter your email">
                <p class="invalid-feedback">Please provide a valid email address.</p>
            </fieldset>

            <!-- Password -->
            <fieldset class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" 
                    required minlength="6" 
                    placeholder="Enter your password">
                <p class="invalid-feedback">Password must be at least 6 characters long.</p>
            </fielset>
            <!-- Verify Password -->
            <fieldset class="form-group">
                <label for="verifyPassword">Verify password</label>
                <input type="password" class="form-control" id="verifyPassword" 
                    placeholder="Verify your password">
                <p class="invalid-feedback">The passwords do not match.</p>
            </fieldset>

            <!-- Submit Button -->
             <fieldset class="row justify-content-start">
                 <button type="submit" class="ml-3 btn btn-primary btn-block col-6 col-sm-5 col-md-4">Register</button>
             </fieldset>
        </form>
        <p id="response" class="mt-3"></p>
    </section>
</s>
<!-- JavaScript for Custom HTML5 Validation Messages -->
<script>
    (function() {
        'use strict';
        var form = document.getElementById('registerForm');

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
                if (input.name === 'firstName') {
                    input.setCustomValidity('Please enter your first name.');
                } else if (input.name === 'lastName') {
                    input.setCustomValidity('Please enter your last name.');
                } else if (input.name === 'email') {
                    input.setCustomValidity('Please enter your email.');
                } else if (input.name === 'password') {
                    input.setCustomValidity('Please enter your password.');
                } else if(input.name === 'verifyPassword'){
                    input.setCustomValidity('Please verify your password.');
                }
            } else if (input.validity.patternMismatch) {
                if (input.name === 'firstName' || input.name === 'lastName') {
                    input.setCustomValidity('Only letters are allowed.');
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
</body>
</html>