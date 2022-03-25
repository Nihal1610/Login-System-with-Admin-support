$(document).ready(function () {
    $('#sign_in_form').submit(function () {
        var name = $('#name').val();
        var email = $('#email').val();
        var number = $('#number').val();
        var password = $('#password').val();
        var confirm_password = $('#cpassword').val();
        var regEx = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var pass = password.length;

        // name validation

        if (name == "") {
            $('#name_error').html("Name can't Be blank");
            return false;
        }
        else {
            $('#name_error').html("");
        }
        // email validation
        if (email == "") {
            $('#email_error').html("Email can't Be blank");
            return false;
        }
        else if (!email.match(regEx)) {
            $('#email_error').html("Email Formate Invalid...");
            return false;
        }
        else {
            $('#email_error').html("");
        }

        // number VAlidation
        if (number == "") {
            $('#number_error').html("Number Can't be blank");
            return false;
        }
        else if (number.length != 10) {
            $('#number_error').html("Number Must be 10 Digit");
            return false;
        }
        else {
            $('#number_error').html("");
        }

        // password validation
        if (password == "") {
            $('#password_error').html("Password can't be blank");
            return false;
        }
        else if (pass < 6) {
            $('#password_error').html("Password at least 6 digit");
            return false;
        }
        else {
            $('#password_error').html("");
        }

        //    confirm password
        if (confirm_password == "") {
            $('#cpassword_error').html("confirm Password can't be blank");
            return false;
        }
        else if (confirm_password !== password) {
            $('#cpassword_error').html("confirm Password and Password did Not match");
            return false;
        }
        else {
            $('#cpassword_error').html("");
        }
    });
});