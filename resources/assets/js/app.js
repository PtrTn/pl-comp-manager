jQuery(document).ready(function() {
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.showbuttons = false;
    $.fn.editable.defaults.onblur = 'submit';

    $('table.lifters tbody td a').each(function() {
        var $this = $(this);
        $this.editable();
    })
});