$(document).ready(function () {

    $('#keyword').on('keyup', function () {
        $('#container').load('searchbox/menu.php?keyword=' + $('#keyword').val());
    })

});