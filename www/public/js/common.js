$(function() {
    /* ---- SEND CSRF TOKEN WITH AJAX CALL ----*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    console.log('junaet hossain');

});
