(function (e) {
    $('#form').on('submit', function (e) {
        e.preventDefault();
        $form = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: {
                'form' : $form,
            },
            success: function(result){
                console.log(result);
            }
        });

    })

})(jQuery)
