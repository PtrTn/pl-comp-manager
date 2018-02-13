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
            $editable = $td.find('a'),
            pk = $td.closest('tr').data('pk'),
            cellIndex = $td.index(),
            $nextTd = $td.closest('tr').next().children('td').eq(cellIndex),
            $nextEditable = $nextTd.find('a');

        $editable.editable({
            type: 'text',
            pk: pk,
            url: '/api/lifter'
        });

        $editable.on('hidden', function (e, reason) {
            if (reason === 'save' || reason === 'cancel') {
                $nextEditable.editable('show');
            }
        });
    });
});

/***/ })

},[70]);