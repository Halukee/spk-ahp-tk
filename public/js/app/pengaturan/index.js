var body = $('body');
var baseurl = $('.baseurl').data('value');
$(document).ready(function(){
    const loadForm = () => {
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
    loadForm();
})
