$(document).ready(function() {
    // Функция отправки формы
    (function() {
        $('#form_submit').on('click', function(ev) {
            ev.preventDefault();
            var data = $('#order-form').serialize();

            $.ajax({
                url: 'form.php',
                method: 'POST',
                dataType: 'html',
                data: data,
            }).done(function(response) {
                var jsoned = JSON.parse(response);
                if(jsoned.success) {
                    $('#success').addClass("popup_active");
                    $('#success_message').html(jsoned.message);
                    $('#order-form')[0].reset();
                } else {
                    $('#error').addClass("popup_active");
                    $('#error_message').html(jsoned.message);
                }
            });
        });
    }());

    // Закрыть popup
    (function() {
        $('.status-popup__close').on('click', function(ev) {
            ev.preventDefault();
            $this = $(this);
            $this.closest('.status-popup').removeClass('popup_active');
        });
    }());
});