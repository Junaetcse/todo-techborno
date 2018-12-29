$(function() {
    /* ---- SEND CSRF TOKEN WITH AJAX CALL ----*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    console.log('junaet hossain');
    $( function() {
        $( '.list-sidebar' ).sortable({
            update: function( event, ui ) {
              var id = $('ul.list-sidebar li').map(function () {
                 return $(this).data('id');
              }).get();
                console.log(id);

                $.ajax({
                    data: {'id':id},
                    type: 'POST',
                    url: 'list/update_sequence'
                })

              },
        });
    } );
});
