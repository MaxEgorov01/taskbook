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
});


