var body = $('body');
var formSubmit = document.getElementById("form-submit");
var validate = $("#form-submit").validate({
    rules: {
        nama_pengaturan: "required",
        pembuat_pengaturan: "required",
        gambar_pengaturan: "required",
        nokontak_pengaturan: "required",
        alamat_pengaturan: "required",
    },
    messages: {
        nama_pengaturan: "Masukan nama aplikasi",
        pembuat_pengaturan: "Masukan nama pembuat aplikasi",
        gambar_pengaturan: "Masukan gambar aplikasi",
        nokontak_pengaturan: "Masukan no. kontak aplikasi",
        alamat_pengaturan: "Masukan alamat",
    }
});

select2Standard({
    parent: '#modalNormal',
    selector: '.select2',
})

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
                    $('#modalNormal').modal('hide');
                    Swal.fire({
                        title: 'Successfully',
                        text: data,
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                },
                error: function (jqXHR, exception) {
                    $("#btn-submit").attr("disabled", false);
                    $("#btn-submit").html(enableButton);
                    Swal.fire({
                        title: 'Failed',
                        text: JSON.parse(jqXHR.responseText).message,
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                },
                complete: function () {
                    $("#btn-submit").attr("disabled", false);
                    $("#btn-submit").html(enableButton);
                },
            });
        }
    }
})