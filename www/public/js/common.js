$(function() {
    /* ---- SEND CSRF TOKEN WITH AJAX CALL ----*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    console.log('junaet hossain');

        $('.list-sidebar').sortable({
            update: function( event, ui ) {
              var id = $('ul.list-sidebar li').map(function () {
                 return $(this).data('id');
              }).get();
                console.log(id);

                $.ajax({
                    data: {'id':id},
                    type: 'POST',
                    url: 'list/sequence'
                })

              },
        });
        
        $('.list-sidebar li a').on('click',function (e) {
                var id = $(this).data('id');
            $('ul li').removeClass('li_active');
            $(this).parent('li').addClass('li_active');
            $.ajax({
                type: 'GET',
                url: '/showList/'+id,
                success: function(result){
                    $("#content-task").html(result);
                    $('input[name=\'slider_id\']').val(id);
                }
            });
            
        })



});
