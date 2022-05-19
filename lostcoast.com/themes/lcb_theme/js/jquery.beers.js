(function($, Drupal) {
    Drupal.behaviors.loadBeer = {
        attach: function(context, settings) {
            var url = $.param.fragment();
            console.log('loaded', url);
            if(url != '') {
                setTimeout(function(){ jQuery('#' + url + ' > a').click(); console.log('execute');}, 300);
            }
        }
    };
}(jQuery, Drupal));