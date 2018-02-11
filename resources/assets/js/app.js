jQuery(document).ready(function () {
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.showbuttons = false;
    $.fn.editable.defaults.onblur = 'submit';
    $.fn.editable.defaults.emptytext = '-';

    $('table.lifters tbody td a').each(function () {
        let $this = $(this),
            pk = $this.closest('tr').data('pk');

        $this.editable({
            type: 'text',
            pk: pk,
            url: '/api/lifter',
        });
    })
});