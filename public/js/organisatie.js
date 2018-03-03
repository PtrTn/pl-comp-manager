webpackJsonp([3],{

/***/ 70:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(71);


/***/ }),

/***/ 71:
/***/ (function(module, exports) {

jQuery(document).ready(function () {
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.showbuttons = false;
    $.fn.editable.defaults.onblur = 'submit';
    $.fn.editable.defaults.emptytext = '-';

    $('table.lifters tbody td').each(function () {
        var $td = $(this),
            $editable = $td.find('a.editable'),
            pk = $td.closest('tr').data('pk');

        $editable.editable({
            pk: pk,
            url: '/api/lifter'
        });
    });

    $('.newLifter a').editable({
        type: 'text',
        name: 'naam',
        emptytext: 'Klik om een lifter toe te voegen'
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
            success: function success(data, config) {
                window.location.reload(false);
            },
            error: function error(errors) {
                $(this).after('<div class="alert alert-danger" role="alert"><strong>Er is iets fout gegaan!</strong> Probeer het nog eens.</div>');
            }
        });
    });
});

/***/ })

},[70]);