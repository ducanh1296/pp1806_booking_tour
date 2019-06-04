$(document).ready(function(){

    $('.btn-del-tour').click(function() {
        if (confirm('You are sure?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var tourId = $(this).data('tour-id');
            var url = '/admin/tours/' + tourId;

            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(result) {

                    if (result.status) {
                        $('.row_' + tourId).remove();
                    } else {
                        alert(result.msg);
                    }
                },
                error: function() {
                    location.reload();
                }
            });
        }
    });
});
