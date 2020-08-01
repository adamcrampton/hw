$(document).ready(function () {
    // Datatables.
    $('table#table-cars').DataTable({

   });

   // Lightbox.
   $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
});
