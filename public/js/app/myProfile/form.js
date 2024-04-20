var body = $('body');
var formSubmit = document.getElementById("form-submit");
var validate = $("#form-submit").validate({
    rules: {
        username_users: "required",
        password_users: "required",
        email_users: {
            required: true,
            email: true
        },
        nama_profile: "required",
        jeniskelamin_profile: "required",
    },
    messages: {
        username_users: "Masukan username anda",
        password_users: "Masukan password anda",
        email_users: {
            required: "Masukan email anda",
            email: "Email anda tidak valid"
        },
        nama_profile: "Masukan nama anda",
        jeniskelamin_profile: "Masukan jenis kelamin anda",
    }
});

$(document).ready(function(){
formSubmit.addEventListener("submit", function (event) {
    event.preventDefault();
    submitData();
});

function submitData() {
        if(validate.valid()){
            const formData = $("#form-submit").serialize();
            
            $.ajax({
                type: "post",
                url: $("#form-submit").attr("action"),
                data: formData,
                dataType: "json",
                beforeSend: function () {
                    $("#btn-submit").attr("disabled", true);
                    $("#btn-submit").html(disableButton);
                },
                success: function (data) {
                    $('#modalLg').modal('hide');
                    Swal.fire({
                        title: 'Successfully',
                        text: data,
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                },
                error: function (jqXHR, exception) {
                    $("#btn-submit").attr("disabled", false);
                    $("#btn-submit").html(enableButton);
                },
                complete: function () {
                    $("#btn-submit").attr("disabled", false);
                    $("#btn-submit").html(enableButton);
                },
            });
        }
    }
})