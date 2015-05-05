$(document).ready(function () {
    $(".select-category li").click(function () {
        $(".select-category li").removeClass('active');
        $(".select-category li").addClass('inactive');
        $('#category').val(this.getAttribute('data-value'));
        $(this).removeClass('inactive');
        $(this).addClass('active');
    });

    $(".select-category li").hover(function () {
        $(this).addClass('transition');
    }, function () {
        $(this).removeClass('transition');
    });

});