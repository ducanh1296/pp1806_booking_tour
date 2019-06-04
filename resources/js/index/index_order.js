$(document).ready(function () {
    $('.btn-del-order').click(function () {
        if (confirm('Are you sure?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var orderId = $(this).data('order-id');
            var url = '/admin/orders/' + orderId;
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(result) {
                    if (result.status) {
                        $('.row_' + orderId).remove();
                        $('.alert-success').show().html('<p>' + result.message + '</p>');
                    } else {
                        $('.alert-warning').show().html('<p>' + result.message + '</p>');
                    }
                },
                error: function (result) {
                    alert(result.message, result.error);
                },
            });
        }
    });
});
