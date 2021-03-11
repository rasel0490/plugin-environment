;(function($) {

    $('#gold_price').on('submit', function(e) {
        e.preventDefault();

        var data = $(this).serialize();
        var RedirectUrl = chowdhurygoldPrice.baseurl;
        //alert( domin );
        $.post(chowdhurygoldPrice.ajaxurl, data, function(response) {
            if (response.success) {
                console.log(response.data.message);
                document.location.href= RedirectUrl;
    
            } else {
                console.log(response.data.message);
            }
        })
        .fail(function() {
            alert(chowdhurygoldPrice.error);
        })

    });

})(jQuery);