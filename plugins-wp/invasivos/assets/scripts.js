$(document).ready(function() {
    $('#select_tipo').on('change', function (e) {
        $('#wrapper_contenido').removeClass('d-none');

        $show = '#contenido_' + $(this).val();
        $hide = $show === '#contenido_imagen' ? '#contenido_codigo' : '#contenido_imagen';

        $($hide).fadeOut('fast', function () {
            $($show).fadeIn('fast');
        });
    });

    $('input[name="manual"]').on('change', function () {
        if( $(this).prop('checked') )
        {
            $this = $(this);
            $this_attr_form = $this.attr('form');
            $form = $('#'+$this_attr_form);

            $.ajax({
                method: 'post',
                url: $form.attr('action'),
                data: $form.serialize()
            })
            .done( function(response) {
                let notice = JSON.parse(response);
                $('.notice-msg').html(notice.element).fadeIn( function () {
                    $(this).delay(1500).fadeOut();
                });
            });
        }
    })
});
