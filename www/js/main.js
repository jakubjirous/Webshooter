$(function () {

    /**
     * Nette AJAX init
     */
    $.nette.init();


    /**
     * Odkazy s atributem data-confirm musi byt potvrzeny
     */
    $('body').on('click', 'a[data-confirm]', function (e) {
        if (!confirm($(this).attr('data-confirm'))) {
            e.stopImmediatePropagation();
            e.preventDefault();
        }
    });


    /**
     * delegate calls to data-toggle="lightbox"
     */
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function (event) {
        event.preventDefault();
        return $(this).ekkoLightbox({
            always_show_close: true
        });
    });


    /**
     * Auto hide flash messages
     */
    setTimeout(function () {
        $("#flash-message").fadeOut('slow');
    }, 3000);



    // radio inputs checked
    $("#engine-type input[type=radio]").change(function () {
        $("input[type=radio]:not(:checked)").parent().removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $("#device-type input[type=radio]").change(function () {
        $("input[type=radio]:not(:checked)").parent().removeClass('checked');
        $(this).parent().addClass('checked');
    });


    $("#tab-mobile input[type=radio]").change(function () {
        $("input[type=radio]:not(:checked)").parent().parent().parent().removeClass('choose');
        $(this).parent().parent().parent().addClass('choose');
    });

    $("#tab-tablet input[type=radio]").change(function () {
        $("input[type=radio]:not(:checked)").parent().parent().parent().removeClass('choose');
        $(this).parent().parent().parent().addClass('choose');
    });

    $("#tab-laptop input[type=radio]").change(function () {
        $("input[type=radio]:not(:checked)").parent().parent().parent().removeClass('choose');
        $(this).parent().parent().parent().addClass('choose');
    });

    $("#tab-desktop input[type=radio]").change(function () {
        $("input[type=radio]:not(:checked)").parent().parent().parent().removeClass('choose');
        $(this).parent().parent().parent().addClass('choose');
    });
});