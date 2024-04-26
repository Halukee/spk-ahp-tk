var body = $('body');
var formSubmit = document.getElementById("form-submit");

var is_edit = $('input[name="is_edit"]').val();
var rulesAdd = {
    gambar_pengaturan: "required",
}
var rulesMessages = {
    gambar_pengaturan: "Masukan nama pembuat aplikasi",
}

if(is_edit){
    rulesAdd = {};
    rulesMessages = {};
}

var validate = $("#form-submit").validate({
    rules: {
        nama_pengaturan: "required",
        pembuat_pengaturan: "required",
        nokontak_pengaturan: "required",
        alamat_pengaturan: "required",
        ...rulesAdd,
    },
    messages: {
        nama_pengaturan: "Masukan nama aplikasi",
        pembuat_pengaturan: "Masukan nama pembuat aplikasi",
        nokontak_pengaturan: "Masukan no. kontak aplikasi",
        alamat_pengaturan: "Masukan alamat",
        ...rulesMessages
    }
});

var loadFormData = () => {
    $.ajax({
        url: `${baseurl}/Pengaturan/create`,
        type: 'get',
        dataType: 'text',
        beforeSend: function(){
            $('#load_output_form').removeClass('d-none');
        },
        success: function(data){
            $('.output_form').html(data);
        },
        complete: function(){
            $('#load_output_form').addClass('d-none');
        }
    })
}

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
            var formData = new FormData($('#form-submit')[0]);
        
            $.ajax({
                type: "post",
                url: $("#form-submit").attr("action"),
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
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
                    loadFormData();
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