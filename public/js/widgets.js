$(document).on('click','.btnWidget.small',function(){
    wid = $(this).data('wid');
    $('#wid_'+wid).slideUp('slow');
    $('#wid_reservation_'+wid).slideDown('slow');
});

$(document).on('click','#btnWidReservationClose',function(){
    wid = $(this).data('wid');
    $('#wid_'+wid).slideDown('slow');
    $('#wid_reservation_'+wid).slideUp('slow');
});

// ---> WIDGET RESERVATION
for (i = 1; i<=3; i++){ // i = 3 for three widgets
    $("#check_in"+i).datepicker({
        changeMonth: true,
        numberOfMonths: 2,
        minDate: 0,
        dateFormat: 'dd/mm/yy',
        onClose: function (selectedDate) {
            $("#check_out"+i).datepicker("option", "minDate", selectedDate);
        }
    });

    $("#check_out"+i).datepicker({
        defaultDate: "+1d",
        changeMonth: true,
        numberOfMonths: 2,
        minDate: 0,
        dateFormat: 'dd/mm/yy',
        onClose: function (selectedDate) {
            $("#check_in"+i).datepicker("option", "maxDate", selectedDate);
        }
    });
}
// <----

$(document).on('click','#btnWidReservation',function(){
    wid = $(this).data('wid');

    if ($('#room_type'+wid).val() == '---'){ alert('You must select a valid room type'); return false; }
    if ($('#check_in'+wid).val() == ''){ alert('You must select check-in date'); return false; }
    if ($('#check_out'+wid).val() == ''){ alert('You must select check-out date'); return false; }

    $('#wid_form_'+wid).submit();
});
