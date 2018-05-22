var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.datatables-editor.Editor( {
        ajax: "../resources/views/admin/patrimonies/list.blade.php",
        table: "#patrimonies",
        fields: [ {
            label: "Status:",
            name: "Status"
        }, {
            label: "Nome:",
            name: "Nome"
        }, {
            label: "Categoria:",
            name: "Categoria"
        }, {
            label: "Modelo:",
            name: "Modelo"
        }, {
            label: "Numero de Série:",
            name: "Numero_de_serie"
        }, {
            label: "Numero de Patrimonio:",
            name: "Numero_de_Patrimonio"
        }, {
            label: "Descrição:",
            name: "Descricao"
        }, {
            label: "Local:",
            name: "local"
        }, {
            label: "Setor:",
            name: "Setor"
        }
        ]
    } );

    $('#example').DataTable( {
        dom: 'Bfrlip',
        ajax: "../resources/views/admin/patrimonies/list.blade.php",
        columns: [
            { data: "Status" },
            { data: "Nome" },
            { data: "Categoria" },
            { data: "Modelo" },
            { data: "Numero_de_serie" },
            { data: "Numero_de_Patrimonio" },
            { data: "Descricao" },
            { data: "local" },
            { data: "Setor" }
        ],
        select: true,
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ]
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
