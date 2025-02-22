var body = $('body');
var formSubmit = document.getElementById("form-submit");
var validate = $("#form-submit").validate({
    rules: {
        matapelajaran_id: "required",
        value_nilai: "required",
    },
    messages: {
        matapelajaran_id: "Masukan mata pelajaran",
        value_nilai: "Masukan nilai",
    }
});

select2Standard({
    selector: '.select2',
    parent: '#modalLg',
})

$(document).ready(function () {
    formSubmit.addEventListener("submit", function (event) {
        event.preventDefault();
        submitData();
    });

    function submitData() {
        if (validate.valid()) {
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
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                    datatable.ajax.reload();
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