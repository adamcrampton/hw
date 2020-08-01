$(document).ready(function () {
    // Datatables.
    $('table#table-cars').DataTable({

   });

   // Lightbox.
   $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    // Owned AJAX toggle.
    $(document).on('click', 'a.owned-toggle', function (e) {
        e.preventDefault();

        const $button = $(this);
        const $icon = $(this).find('i');
        const car = $(this).attr('data-car-id');
        const user = $(this).attr('data-user-id');
        const owned = $(this).attr('data-owned');
        
        const endpoint = '/api/users/cars/toggle-ownership';
        let formData = new FormData;
        formData.append('car', car);
        formData.append('user', user);
        formData.append('owned', owned);

        $.ajax({
            async: true,
            contentType: false,
            processData: false,
            url: endpoint,
            method: 'POST',
            data: formData,
            beforeSend: function(jqXHR, settings) {
                $icon.removeClass('fa-check')
                        .removeClass('fa-times-circle fa-check-circle text-danger text-success')
                        .addClass('fas fa-compact-disc')
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                $icon.removeClass('fa-compact-disc');

                if (owned) {
                    $icon.addClass('fa-check-circle text-success');
                } else {
                    $icon.addClass('fa-times-circle text-danger');
                }
            },
            success: function(data, textStatus, jqXHR) {
                $icon.removeClass('fa-compact-disc');

                if (owned === '1') {
                    $icon.addClass('fa-times-circle text-danger');
                    $button.attr('data-owned', '0');
                } else {
                    $icon.addClass('fa-check-circle text-success');
                    $button.attr('data-owned', '1');
                }
            }
        });
    });
});
