(function($){
    $(document).ready(function(){
        $('.filter').change(function(){
            var val = $(this).val();
            $(this).closest('.vendors').find('.hidden').removeClass('hidden');
            if(val != ''){
                $(this).closest('.vendors').find('.view-content > *').not('.' + val).addClass('hidden');
            }
        });
    });
})(jQuery);