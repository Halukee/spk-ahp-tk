var body = $('body');
var baseurl = $('.baseurl').data('value');


$(document).ready(function(){
    body.on('click','.btn-edit', function(e) {
        e.preventDefault();
        showModal({
            url: `${baseurl}/Profile/edit/1`,
            modalId: 'modalLg',
            title: 'Form Edit Profile',
            type: 'get'
        })
    })
})