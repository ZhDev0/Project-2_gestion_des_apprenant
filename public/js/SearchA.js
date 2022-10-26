$('#searcha').on('keyup', function () {
    $value = $(this).val();
    $.ajax({
        type: 'get',
        url: 'searcha',
        // url : '{{URL::to('search')}}',
        data: { 'key': $value },
        success: function (data) {
            $('#tbody').html(data);
        }
    });
});
