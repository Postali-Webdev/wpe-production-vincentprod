jQuery(function ($) {
    "use strict";

    $(document).ready(function () {
        
        $('.return-link').on('click', function (e) {
            e.preventDefault();
            const url = new URL(window.location.href);
            var returnUrl = url.searchParams.get('return');
            console.log(returnUrl);
            window.location.href = returnUrl;
        });

    });

});