$(document).ready(function() {
    $('#btn-login').on('click', function() {
        $('#content').css('filter', 'blur(5px)');
        $('#overlay').fadeIn();
    });

    $("#close-popup").on('click', function() {
        $('#overlay').fadeOut();
        $('#content').css('filter', 'none');
    });
});
