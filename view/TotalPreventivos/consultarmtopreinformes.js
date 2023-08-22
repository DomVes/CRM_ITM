var tabla;
var usu_id =  $('#user_idx').val();
var rol_id =  $('#rol_idx').val();
function init(){

}

$(document).ready(function(){        
       
    /* TODO: Llenar Combo Sede en Filtro*/
    $.post("../../controller/sede.php?op=combo",function(data, status){
        $('#sede_id').html(data);
    });
    
    /* TODO: Filtro avanzado en caso de ser soporte */   

    listardatatable_p('%%','%%','%%')
    
});


/* TODO:Filtro avanzado */
$(document).on("click","#btnfiltrar_p", function(){
    limpiar_p();
    var sede_id = $('#sede_id').val();
    var p_placa = $('#p_placa').val();
    var p_nomb = $('#p_nomb').val();
    listardatatable_p(sede_id,p_placa,p_nomb);

});

/* TODO: Restaurar Datatable js y limpiar */
$(document).on("click","#btntodo_p", function(){
    limpiar_p();
    $('#sede_id').val('').trigger('change');
    $('#p_placa').val('');
    $('#p_nomb').val('');
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
            url: '../../controller/preventivo.php?op=listar_p_informes',
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
        "iDisplayLength": 17,
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