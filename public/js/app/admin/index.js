var body = $('body');
var baseurl = $('.baseurl').data('value');
$(document).ready(function(){
    body.on('click','.btn-add', function(e) {
        e.preventDefault();
        showModal({
            url: `${baseurl}/Admin/create`,
            modalId: 'modalNormal',
            title: 'Form Admin',
            type: 'get'
        })
    })
})
