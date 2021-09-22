$(document).ready(function() {
    $('#btn-login').on('click', function() {
        $('#content').css('filter', 'blur(5px)');
        $('#authorization_form').fadeIn();
    });

    $("#close-popup").on('click', function() {
        $('#authorization_form').fadeOut();
        $('#content').css('filter', 'none');
    });
	
	$('#btn-create-task').on('click', function() {
        $('#content').css('filter', 'blur(5px)');
        $('#create_form').fadeIn();
    });

    $("#close-popup-create-form").on('click', function() {
        $('#create_form').fadeOut();
        $('#content').css('filter', 'none');
    });

    $('.btn-del').on('click', function() {
        let block_del = $(this).next('div');
        let btn_del = $(this).next('div').find('.btn-danger');
        block_del.fadeIn();
    });

    $('.no-del').on('click', function() {
        let block_del_none = $(this).parent('.popup-btn-del');
        block_del_none.fadeOut();
    });

});


