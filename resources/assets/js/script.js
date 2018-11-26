$(document).ready(function() {
    var table = $('#patrimonies').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5 , 6, 7, 8, 9]
                },
                title: 'Lista de Patrimonios - IFSP'
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5 , 6, 7, 8, 9]
                },
                title: 'Lista de Patrimonios - IFSP'
            },
            {
                extend: 'csvHtml5',
                text: 'CSV',
                exportOptions: {
                    modifier: {
                        search: 'none'
                    },
                    columns: [ 1, 2, 3, 4, 5 , 6, 7, 8, 9]
                }
            },{
                text: 'JSON',
                action: function ( e, dt, button, config ) {
                    var data = dt.buttons.exportData({
                        columns: [1,2,3,4,5,6,7,8,9]
                    });

                    $.fn.dataTable.fileSave(
                        new Blob( [ JSON.stringify( data ) ] ),
                        'Export.json'
                    );
                }
            }],
        select: true,
    } );
} );


$('#quantity').on('change', function() {
    if (jQuery(this).val() > 1 && jQuery('.finalNumber').length === 0) {
        var finalNumber = Number(jQuery(this).val()) + Number(jQuery('#InitialNumber').val());
        jQuery('.patrimonyNumbers').append('<div class="form-group finalNumber"><label for="description">Número de Patrimônio Final</label><input type="text" class="form-control" name="patrimonyNumberFinal" placeholder="Número de Patrimônio Final" required="" id="FinalNumber" value="' + finalNumber + '"></div>');
        jQuery('.finalNumber').fadeIn();
    } else if (jQuery(this).val() == 1 && jQuery('.finalNumber').length > 0) {
        jQuery('.finalNumber').fadeOut();
        var b = document.getElementsByClassName('finalNumber');
        var a = document.getElementByClassName('patrimonyNumbers');
        a[0].removeChild(b[0]);
    } else if (jQuery(this).val() > 1 && jQuery('.finalNumber').length !== 0) {
        jQuery('#FinalNumber').attr('value', Number(jQuery(this).val()) + Number(jQuery('#InitialNumber').val()));
    }
});