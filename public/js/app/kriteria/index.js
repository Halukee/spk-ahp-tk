var body = $('body');
var baseurl = $('.baseurl').data('value');
$(document).ready(function(){
    body.on('click','.btn-add', function(e) {
        e.preventDefault();
        showModal({
            url: `${baseurl}/Kriteria/create`,
            modalId: 'modalNormal',
            title: 'Form Kriteria',
            type: 'get'
        })
    })

    body.on('click','.btn-edit', function(e) {
        e.preventDefault();
        showModal({
            url: $(this).attr('href'),
            modalId: 'modalNormal',
            title: 'Form Kriteria',
            type: 'get'
        })
    })

    body.on('click','.btn-delete', function(e) {
        e.preventDefault();
        basicDeleteConfirmDatatable({
            urlDelete: $(this).attr('href'),
        })
    })

    const generateKodeKriteria = () => {
        $.ajax({
            url: `${baseurl}/Kriteria/generateKode`,
            type: 'get',
            dataType: 'json',
            success: function(data){
                console.log('get data', data);
            }
        })
    }
    generateKodeKriteria();
})
