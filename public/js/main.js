$(function () {

    $('#categories_tree').jstree({
        'core' : {
            'data' : {
                'url' : 'http://cudev.loc/api/' + window.app_locale + '/tree',
                'data' : function (node) {
                    //
                }
            }
        }});
});