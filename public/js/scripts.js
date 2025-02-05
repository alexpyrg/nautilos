function jvars() {
    jPost = $('input,textarea,select').serializeArray();
    return jPost;
}

$(document).ready(function () {


    $('#check_in_img, #check_out_img').tooltip({

        position: {
            my: "center bottom-20",
            at: "center top",
            using: function (position, feedback) {
                $(this).css(position);
                $("<div>")
                    .addClass("arrow")
                    .addClass(feedback.vertical)
                    .addClass(feedback.horizontal)
                    .appendTo(this);
            }
        }
    });


    $("#owl").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 500,
        pagination: false,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        lazyLoad: true,
        transitionStyle: "fade"
    });

    $("#check_in").datepicker({
        changeMonth: true,
        numberOfMonths: 2,
        minDate: 0,
        dateFormat: 'dd/mm/yy',
        onClose: function (selectedDate) {
            $("#check_out").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#check_out").datepicker({
        defaultDate: "+1d",
        changeMonth: true,
        numberOfMonths: 2,
        minDate: 0,
        dateFormat: 'dd/mm/yy',
        onClose: function (selectedDate) {
            $("#check_in").datepicker("option", "maxDate", selectedDate);
        }
    });

    $("#room_type").change(function () {

        let value = $(this).val();
        let newOptions = {};
        if (value == '---' || value == 1 || value == 2 || value == 3 || value == 4) {
            newOptions = {
                "1": "1",
                "2": "2",
                "3": "3",
                "4": "4"
            };
        } else if (value == 5) {
            newOptions = {
                "1": "1",
                "2": "2"
            };
        } else if (value == 6) {
            newOptions = {
                "1": "1"
            };
        }

        let $el = $("#room_no");
        $el.empty(); // remove old options
        $.each(newOptions, function (key, value) {
            $el.append($("<option></option>")
                .attr("value", value).text(key));
        });
    });

    $(document).on('click', '#btnReservationCheck', function () {
        if ($('#room_type').val() == '---' || $('#check_in').val() == '' || $('#check_out').val() == '') {
            alert('Please complete all fields');
            return false;
        } else if ($('#room_type').val() === '5') {
            var check_in = $('#check_in').val().split('/');
            var check_in_date = new Date(check_in[2], check_in[1], check_in[0]);

            var check_out = $('#check_out').val().split('/');
            var check_out_date = new Date(check_out[2], check_out[1], check_out[0]);
            var days_to_check = 1000 * 60 * 60 * 24 * 2; //in ms

            if (check_out_date - check_in_date < days_to_check) {
                alert('You must book at least 2 days for Akrolithos Apartments');
                return false;
            } else {
                $('#reservation_form').submit();
            }
            return false;
        } else if ($('#room_type').val() === '6') {
            var check_in = $('#check_in').val().split('/');
            var check_in_date = new Date(check_in[2], check_in[1], check_in[0]);

            var check_out = $('#check_out').val().split('/');
            var check_out_date = new Date(check_out[2], check_out[1], check_out[0]);
            var days_to_check = 1000 * 60 * 60 * 24 * 3; //in ms

            if (check_out_date - check_in_date < days_to_check) {
                alert('You must book at least 3 days for Ikia Apartment');
                return false;
            } else {
                $('#reservation_form').submit();
            }
            return false;
        } else {
            $('#reservation_form').submit();
        }
    });


    $(document).on('click', '#btn-step2a', function () {
        if ($('#name').val() == '') {
            alert('Not a valid name');
            return false;
        }
        if ($('#surname').val() == '') {
            alert('Not a valid surname');
            return false;
        }
        if ($('#email').val() == '') {
            alert('Not a valid email');
            return false;
        }
        if ($('#telephone').val() == '') {
            alert('Not a valid telephone');
            return false;
        }
        if ($('#address').val() == '') {
            alert('Not a valid address');
            return false;
        }
        if ($('#city').val() == '') {
            alert('Not a valid city');
            return false;
        }
        if ($('#postalcode').val() == '') {
            alert('Not a valid postal code');
            return false;
        }
        if ($('#arrival_time').val() == '') {
            alert('Not a valid arrival time');
            return false;
        }

        $('#preview_name').html($('#title').val() + ' ' + $('#name').val() + ' ' + $('#surname').val());
        $('#preview_email').html($('#email').val());
        $('#preview_telephone').html($('#telephone').val());
        $('#preview_address').html($('#address').val());
        $('#preview_city').html($('#city').val());
        $('#preview_pc').html($('#postalcode').val());
        $('#preview_country').html($('#country').val());
        $('#preview_arrival_time').html($('#arrival_time').val());
        $('#preview_comments').html($('#comments').val());

        $('#step2').slideUp('slow');
        $('#step2a').slideDown('slow', function () {
            $('#step2a')[0].scrollIntoView();
        });

        $('.bookingStep').each(function () {
            $(this).removeClass('active');
        });

        $('#i-step1').addClass('active');
        $('#i-step2').addClass('active');

    });

    $(document).on('click', '#btn-step2', function () { //Preview details
        $('#step2a').slideUp('slow');
        $('#step2').slideDown('slow');

        $('.bookingStep').each(function () {
            $(this).removeClass('active');
        });

        $('#i-step1').addClass('active');

    });

    $(document).on('click', '#btn-step3', function () {
        $('#confirm_code').val('112233');
        $('#step2a').slideUp('slow');
        $('#step3').slideDown('slow');

        $('.bookingStep').each(function () {
            $(this).removeClass('active');
        });

        $('#i-step1').addClass('active');
        $('#i-step2').addClass('active');
        $('#i-step3').addClass('active');

    });

    $(document).on('click', '#btn-back-step2', function () {
        $('#confirm_code').val('0');
        $('#step3').slideUp('slow');
        $('#step2a').slideDown('slow');

        $('.bookingStep').each(function () {
            $(this).removeClass('active');
        });

        $('#i-step1').addClass('active');
        $('#i-step2').addClass('active');
    });

    $(document).on('click', '#btn-step4', function () {

        if ($('#rules_confirm').prop('checked') == false) {
            alert('You must accept the Rules & Confirmation Policy');
            return false;
        }

        $('#container_booking').hide();
        $('#step3').slideUp('slow');
        $('#step4').slideDown('slow');

        $('.bookingStep').each(function () {
            $(this).removeClass('active');
        });

        $('#i-step1').addClass('active');
        $('#i-step2').addClass('active');
        $('#i-step3').addClass('active');

        jposts = jvars();
        $('#step4').load('loads.php', {option: 'confirm_reservation', jqPost: jposts});

    });

    // $("#siteseal img").on("click", verifyGoDaddySSLSeal);

//     function verifyGoDaddySSLSeal() {
//         window.open
//         (
//             "https://seal.godaddy.com/verifySeal?sealID=KZF1TmuMEsTov1eXJDt1jax6hRNleCsEsZiYW5kzmUgb1sFmAt7FC0qYuCWc",
//             "SealVerfication",
//             "menubar=no,toolbar=no,personalbar=no,location=yes,status=no,resizable=yes,fullscreen=no,scrollbars=no,width=593,height=460"
//         );
//     }
});

