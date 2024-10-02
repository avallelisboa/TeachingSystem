<!DOCTYPE html>
<html lang="es">
<?php require_once("./Shared/head.php") ?>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Register</h2>
    <form id="registerForm" novalidate>
        <!-- First Name -->
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" 
                   required pattern="[A-Za-z]+" 
                   placeholder="Enter your first name">
            <div class="invalid-feedback">Please provide a valid first name.</div>
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" 
                   required pattern="[A-Za-z]+" 
                   placeholder="Enter your last name">
            <div class="invalid-feedback">Please provide a valid last name.</div>
        </div>

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

        <!-- Role (Student/Teacher) -->
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role[]" multiple required>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
            <div class="invalid-feedback">Please select at least one role.</div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>

    <div id="response" class="mt-3"></div>
</div>
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
                if (input.name === 'first_name') {
                    input.setCustomValidity('Please enter your first name.');
                } else if (input.name === 'last_name') {
                    input.setCustomValidity('Please enter your last name.');
                } else if (input.name === 'email') {
                    input.setCustomValidity('Please enter your email.');
                } else if (input.name === 'password') {
                    input.setCustomValidity('Please enter your password.');
                } else if (input.name === 'role[]') {
                    input.setCustomValidity('Please select at least one role.');
                }
            } else if (input.validity.patternMismatch) {
                if (input.name === 'first_name' || input.name === 'last_name') {
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