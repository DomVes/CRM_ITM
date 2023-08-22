var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

/* TODO: Guardar datos de los input */
function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../controller/preventivo.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#usuario_form')[0].reset();
            /* TODO:Ocultar Modal */
            $("#modalmantenimiento").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();

            /* TODO:Mensaje de Confirmacion */
            swal({
                title: "HelpDesk!",
                text: "Completado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
            listardatatable_p('%%','%%','%%');
        }
        
    }); 
}
$(document).ready(function(){   

     /* TODO: Inicializar SummerNote */
     $('#p_descrip').summernote({
        height: 150,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        },
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });     
      
    /* TODO: Llenar Combo Sedes en tabla de filtro*/
    $.post("../../controller/sede.php?op=combo", function(data, status){
        $('#sede_id2').html(data);
    }); 
    listardatatable_p('%%','%%','%%')
    
});


/* TODO:Filtro avanzado */
$(document).on("click","#btnfiltrar_p", function(){
    limpiar_p();
    var sede_id = $('#sede_id2').val();
    var p_placa = $('#p_placa2').val();
    var p_nomb = $('#p_nomb2').val();
    listardatatable_p(sede_id,p_placa,p_nomb);

});

/* TODO: Restaurar Datatable js y limpiar */
$(document).on("click","#btntodo_p", function(){
    limpiar_p();
    $('#sede_id2').val('').trigger('change');
    $('#p_placa2').val('');
    $('#p_nomb2').val('');
    listardatatable_p('%%','%%','%%');
});

/* TODO: Listar datatable_p con filtro avanzado */
function listardatatable_p(sede_id,p_placa,p_nomb){
    
    tabla=$('#mto_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
                'excelHtml5'
                ],
        "ajax":{
            url: '../../controller/preventivo.php?op=listar_p_filtro',
            type : "post",
            dataType : "json",
            data:{ sede_id:sede_id,p_placa:p_placa,p_nomb:p_nomb},
            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 18,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable();
}

/* TODO: Mostrar informacion segun ID en los inputs */
function editar(p_id){
    $('#mdltitulo').html('Editar Registro');    
    /* TODO: Mostrar Informacion en los inputs */
    $.post("../../controller/preventivo.php?op=mostrar", {p_id : p_id}, function (data) {
        data = JSON.parse(data);
        $('#p_id').val(data.p_id);
        $('#p_ubicacion').val(data.p_ubicacion);
        $('#p_nomb').val(data.p_nomb);
        $('#p_ip').val(data.p_ip);
        $('#p_serial').val(data.p_serial);
        $('#p_disco').val(data.p_disco);
        $('#p_ram').val(data.p_ram);
        $('#p_so').val(data.p_so);
        $('#p_vidadisco').val(data.p_vidadisco);
        $('#p_tecnico').val(data.p_tecnico);
                
    });    
    /* TODO: Mostrar Modal */
    $('#modalmantenimiento').modal('show');
}

function limpiar_p(){
    $('#table').html(
        "<table id='mto_data' class='table table-bordered table-striped table-vcenter js-dataTable-full'>"+
            "<thead>"+
                "<tr>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Sede</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Ubicación</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Marca</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Referencia</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Tipo de Equipo</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Serial</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Nombre de equipo</th>"+
                    "<th class='text-center' style='width: 5%;'>Actualizar</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Placa</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Dirección IP</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Procesador</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Disco duro</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Ram</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Sistema Operativo</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>% Vida Disco duro</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Fecha de Registro</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Tecnico Responsable</th>"+
                    "<th class='d-none d-sm-table-cell' style='width: auto;'>Observaciones</th>"+                    
                "</tr>"+
            "</thead>"+
            "<tbody>"+
            "</tbody>"+
        "</table>"
    );
}

init();