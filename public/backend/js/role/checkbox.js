$(document).ready(function () {
    $(document).on('change', '.role-child', function () {
       var count = $(this).data('count');
        var key = $(this).data('key');
        var checkBoxlength = $('.'+key+'-permission-child:checked').length;
       if(count==checkBoxlength) {
        $('#role-'+key).prop('checked', true);
       } else {
           $('#role-'+key).prop('checked', false);
       }
    });
    $(document).on('change', '#check-all', function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    })

    $(document).on('change', '.check-role-all', function () {
        var key = $(this).data('key');
        $('.'+key+'-permission-child').not(this).prop('checked', this.checked);
    });
});