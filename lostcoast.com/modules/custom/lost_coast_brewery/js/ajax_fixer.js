(function($, Drupal) {
    Drupal.ajax.prototype.commands.afterAjaxCallback = function(ajax, response, status)
    {
        initCustomForms();
    };
}(jQuery, Drupal));