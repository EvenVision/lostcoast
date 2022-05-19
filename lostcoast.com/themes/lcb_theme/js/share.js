(function($){
    $(document).ready(function(){
        $('.share').click(function(){
            var the_url = $(this).attr('href');
            var service = $(this).attr('ui-service');
            var url;
            switch(service){
                case 'facebook':
                    url = 'https://www.facebook.com/sharer/sharer.php?u=' + the_url;
                    break;
                case 'twitter':
                    var message = $(this).attr('ui-message');
                    url = 'https://twitter.com/intent/tweet?text=' + message + '&url=' + the_url;
                    break;
            }
            window.open(url, 'sharer', 'width=600,height=400,top=200,left=200');
            return false;
        });
    });
})(jQuery);