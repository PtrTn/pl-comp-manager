jQuery(document).ready(function () {
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.showbuttons = false;
    $.fn.editable.defaults.onblur = 'submit';
    $.fn.editable.defaults.emptytext = '-';

    $('table.lifters tbody td').each(function () {
        let $td = $(this),
            $editable = $td.find('a.editable'),
            pk = $td.closest('tr').data('pk'),
            cellIndex = $td.index(),
            $nextTd = $td.closest('tr').next().children('td').eq(cellIndex),
            $nextEditable = $nextTd.find('a');

        $editable.editable({
            pk: pk,
            url: '/api/lifter'
        });

        $editable.on('hidden', function (e, reason) {
            if(reason === 'save' || reason === 'cancel') {
                $nextEditable.editable('show');
            }
        });
    });


    $('.newLifter a').editable({
        type: 'text',
        name: 'naam',
        emptytext: 'Klik om nog een lifter toe te voegen',
    });


    $('.newLifter a').on('hidden', function (e, reason) {
        if (reason !== 'save') {
            return;
        }

        $('.newLifter a').editable('submit', {
            ajaxOptions: {
                url: '/api/lifter/add',
                dataType: 'json' //assuming json response
            },
            success: function (data, config) {
                window.location.reload(false);
            },
            error: function (errors) {
                $(this).after('<div class="alert alert-danger" role="alert"><strong>Er is iets fout gegaan!</strong> Probeer het nog eens.</div>');
            }
        });
    });
});

[{text: 'Vrouwen', children: ['47kg', '52kg', '57kg', '63kg', '72kg', '84kg', '+84kg']}]