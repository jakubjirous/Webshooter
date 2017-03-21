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
        $('#flash-message').fadeOut('slow');
    }, 3000);


    // radio inputs checked
    $('#engine-type input[type=radio]').change(function () {
        $('input[type=radio]:not(:checked)').parent().removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $('#device-type input[type=radio]').change(function () {
        $('input[type=radio]:not(:checked)').parent().removeClass('checked');
        $(this).parent().addClass('checked');
    });


    $('#tab-mobile input[type=radio]').change(function () {
        $('input[type=radio]:not(:checked)').parent().parent().parent().removeClass('choose');
        $(this).parent().parent().parent().addClass('choose');
    });

    $('#tab-tablet input[type=radio]').change(function () {
        $('input[type=radio]:not(:checked)').parent().parent().parent().removeClass('choose');
        $(this).parent().parent().parent().addClass('choose');
    });

    $('#tab-laptop input[type=radio]').change(function () {
        $('input[type=radio]:not(:checked)').parent().parent().parent().removeClass('choose');
        $(this).parent().parent().parent().addClass('choose');
    });

    $('#tab-desktop input[type=radio]').change(function () {
        $('input[type=radio]:not(:checked)').parent().parent().parent().removeClass('choose');
        $(this).parent().parent().parent().addClass('choose');
    });

    $('[data-tolerance-change]').on('input', function () {
        $('[data-tolerance-value]').html($(this).val() + ' %');
    });


    /**
     * Typed text on homepage
     */
    $('#typed-element').typed({
        strings: [
            'Web page application to creating website screenshots.',
            'A lot of predefined device resolutions.',
            'Simple screenshots comparison according to user defined criteria.',
            'Visual comparision results analysis.',
            'Adjustable time schedule for the comparison.',
            'Saving results to a clear history.',
            'E-mail notification containing the results.',
            'User friendly interface.'
        ],
        typeSpeed: 0,
        backSpeed: -500,
        loop: true,
        backDelay: 3500
    });


    /**
     * Jquery Datetime Picker
     */
    $('[data-datetime-picker-start]').datetimepicker({
        format: 'd.m.Y H:i',
        step: 5
    });
    $('[data-datetime-picker-start-snow]').on('click', function() {
        $('[data-datetime-picker-start]').datetimepicker('show');
    });


    $('[data-datetime-picker-end]').datetimepicker({
        format: 'd.m.Y H:i',
        step: 5,
        minDate: $.now(),
        minTime: $.now()
    });
    $('[data-datetime-picker-end-snow]').on('click', function() {
        $('[data-datetime-picker-end]').datetimepicker('show');
    });
 });