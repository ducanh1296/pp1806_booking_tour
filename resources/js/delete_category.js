$(document).ready(function(){

    $('.btn-del-category').click(function() {
        if (confirm('You are sure?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var categoryId = $(this).data('category-id');
            var url = '/categories/' + categoryId;

            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(result) {

                    if (result.status) {
                        $('.row_' + categoryId).remove();
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
