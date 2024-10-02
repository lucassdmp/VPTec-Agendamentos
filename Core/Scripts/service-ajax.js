jQuery(document).ready(function ($) {
    $('#vptec-register-service-form').submit(function (e) {
        e.preventDefault();

        var data = new FormData(this);
        data.append('action', 'create_service_ajax');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    alert(response.data.message);
                } else {
                    alert(response.data.message);
                }
            },
            error: function (xhr, status, error) {
                alert('Erro: ' + error + '\nStatus: ' + status + '\nResposta: ' + xhr.responseText);
                console.log(xhr);
            }
        });

    });
});