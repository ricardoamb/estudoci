$(document).ready(function(){
    if($('.alert').data('alert') == true){
        $('.modal-content').prepend('<p class="text-center">' + $('.alert').data('alert-message') + '</p>');
        switch ($('.alert').data('type'))
        {
            case 'success':
                $('.modal-content').addClass('modal-alert-success');
        }
        $('.modal-alert').modal('show');
    }

    $('.btn-alert-ok').click(function(){
        $('.modal-alert').modal('hide');
        $('#nome').focus();
    });
});