$(document).ready(function(){
    $("#form-submit").validate({
        rules: {
            email_username_users: "required",
            password_users: "required",
        },
        messages: {
            email_username_users: "Masukan email atau password anda",
            password_users: "Masukan password anda",
        }
    });

})