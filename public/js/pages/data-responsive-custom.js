$(document).ready(function() {
    setTimeout(function() {
        // [ Configuration Option ]
        if ($('#res-config').length) {
            $('#res-config').DataTable({
                responsive: true,
            });
        }

        // [ New Constructor ]
        if ($('#new-cons').length) {
            var newcs = $('#new-cons').DataTable();
            new $.fn.dataTable.Responsive(newcs);
        }

        // [ Immediately Show Hidden Details ]
        if ($('#show-hide-res').length) {
            $('#show-hide-res').DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.childRowImmediate,
                        type: ''
                    }
                }
            });
        }

    }, 350);
});
