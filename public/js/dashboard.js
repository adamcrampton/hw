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
        e.preventDefault;

        const car = $(this).attr('data-car-id');
        const user = $(this).attr('data-user-id');
        const owned = $(this).attr('data-owned');
        
        const endpoint = '/api/users/cars/toggle-ownership';
        let formData = new FormData;
        formData.append('car', car);
        formData.append('user', user);

        $.ajax({
            async: true,
            contentType: false,
            processData: false,
            url: endpoint,
            method: 'POST',
            data: formData,
            beforeSend: function(jqXHR, settings) {
                $(this).find('i').removeClass('fa-check')
                                    .removeClass('fa-times')
                                    .addClass('fas')
                                    .addClass('fa-compact-disc')
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                $(this).find('i').removeClass('fas')
                                    .removeClass('fa-compact-disc');

                if (owned) {
                    $(this).addClass('fa-check');
                } else {
                    $(this).addClass('fa-times');
                }
                                    
            },
            success: function(data, textStatus, jqXHR) {
                $(this).find('i').removeClass('fas')
                .removeClass('fa-compact-disc');

                if (owned) {
                $(this).addClass('fa-times');
                } else {
                $(this).addClass('fa-check');
                }
            },
            complete: function(jqXHR, textStatus)
            {

            }
});
    });
});
