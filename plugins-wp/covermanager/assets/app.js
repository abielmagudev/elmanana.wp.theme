$(function () {
    $("input[name='layout']").on('change', function () {
        var $fieldsets_cover = $('#fieldsets-cover').children('fieldset');
        var fieldset_this = '#fieldset-' + $(this).attr('id');

        $.each($fieldsets_cover, function (key, fieldset_cover) {
            var fieldset_cover_id = '#' + fieldset_cover.id;
            
            if(fieldset_cover_id === fieldset_this)
            {
                $(fieldset_this).prop('disabled', false).fadeIn();
                return;
            }

            $(fieldset_cover_id).fadeOut('fast', function() {
                $(this).prop('disabled', true)
            });
        });

    });
});