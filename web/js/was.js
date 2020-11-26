(function($) {
    // "use strict"; // Start of use strict
    $(function() {

        // Проверим, есть ли запись в куках о посещении посетителя
        // Если запись есть - ничего не делаем
        if (!$.cookie('contract_acepted')) {

            // Покажем всплывающее окно
            $('#boxUserFirstInfo').arcticmodal({
                closeOnOverlayClick: false,
                closeOnEsc: false
            });

        }

        // Запомним в куках, что посетитель к нам уже заходил
        // $.cookie('was', true, {
        //     expires: 365,
        //     path: '/'
        // });

    })
})(jQuery)