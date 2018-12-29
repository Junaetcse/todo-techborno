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
                $(this).children().each(function(index) {
                    $(this).find('td').last().html(index + 1)
                });
            },
            stop:function (event , ui) {
                $( ui.item ).removeClass( "ui-sortable-active" );
            }

        });
    } );
});
