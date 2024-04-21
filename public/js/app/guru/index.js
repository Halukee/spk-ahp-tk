var body = $('body');
var baseurl = $('.baseurl').data('value');
$(document).ready(function(){
    body.on('click','.btn-add', function(e) {
        e.preventDefault();
        showModal({
            url: `${baseurl}/Guru/create`,
            modalId: 'modalNormal',
            title: 'Form Guru',
            type: 'get'
        })
    })
})
