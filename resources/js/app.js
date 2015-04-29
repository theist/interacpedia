$(document).ready(function () {
    $(".register-form .select-category li").click(function () {
        $(".register-form .select-category li").removeClass('active');
        $(".register-form .select-category li").addClass('inactive');
        $('#category').val(this.getAttribute('data-value'));
        $(this).removeClass('inactive');
        $(this).addClass('active');
    });

    $(".register-form .select-category li").hover(function () {
        $(this).addClass('transition');
    }, function () {
        $(this).removeClass('transition');
    });

});