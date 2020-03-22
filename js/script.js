$(document).ready(function () {

    $('.allTask').load('/alltask');

    $('.adminAllTask').load('/allTask/adminAllTask');

    $("select option[value='" + $.cookie('sort') + "']").attr("selected", "selected");

    $('select').on('change', function (e) {
        let optionSelected = $("option:selected", this);
        let valueSelected = this.value;

        $.cookie('sort', valueSelected);
        $('.allTask').load('/allTask');
        $('.adminAllTask').load('/allTask/adminAllTask');
    });

    $('#addTask').submit(function (event) {

        event.preventDefault();

        var $data = {};

        $('#addTask').find('input, textarea').each(function () {
            $data[this.id] = $(this).val();
        });

        let formData = new FormData();
        formData.append('name', $data['name']);
        formData.append('email', $data['email']);
        formData.append('task', $data['task']);


        $.ajax({
            type: "POST",
            url: "/Task/addTask",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: function (data) {
                var $data = JSON.parse(data);
                $('#error').addClass('d-none');

                if ($data.result == "success") {
                    $("#success").addTemporaryClass("d-block", 3000);
                    $('.allTask').load('/allTask');
                } else {
                    $('#error').addTemporaryClass("d-block", 3000);
                }
            },
            error: function (request) {
                $('#error').addTemporaryClass("d-block", 3000);
                $('#error').text('Произошла ошибка ' + request.responseText + ' при отправке данных.');
            }
        });

    });

    (function ($) {

        $.fn.extend({

            addTemporaryClass: function (className, duration) {
                var elements = this;
                setTimeout(function () {
                    elements.removeClass(className);
                }, duration);

                return this.each(function () {
                    $(this).addClass(className);
                });
            }
        });

    })(jQuery);

});
