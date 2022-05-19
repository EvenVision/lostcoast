function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
            end = dc.length;
        }
    }
    return unescape(dc.substring(begin + prefix.length, end));
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

(function($){

    function checkAge(){
        console.log('check age');
        if(getCookie('verified_age')){
            console.log('verified');
            $('#overlay').addClass('hidden');
        }
    }

    $(document).ready(function(){
        checkAge();

        $('#accept').click(function(){
            setCookie('verified_age','1',7);
            $('#overlay').addClass('hidden');
            console.log('Accepted');
        });

        $('#leave').click(function(){
            window.history.back();
        });
    });

}(jQuery));