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
       
    /* TODO: rol si es 1 entonces es usuario */
    if (rol_id==1){   
        tabla=$('#mtoc_data').dataTable({
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
                url: '../../controller/correctivo.php?op=listar_c_x_usu',
                type : "post",
                dataType : "json",
                data:{ usu_id : usu_id },
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
    }else{
        /* TODO: Filtro avanzado en caso de ser soporte */        
        listardatatable_c('%%','%%','%%')
    }
});


/* TODO:Filtro avanzado */
$(document).on("click","#btnfiltrar_c", function(){
    limpiar_c();
    var sede_id = $('#sede_id').val();
    var c_placa = $('#c_placa').val();
    var c_nomb = $('#c_nomb').val();
    listardatatable_c(sede_id,c_placa,c_nomb);

});

/* TODO: Restaurar Datatable js y limpiar */
$(document).on("click","#btntodo_c", function(){
    limpiar_c();
    $('#sede_id').val('').trigger('change');
    $('#c_placa').val('');
    $('#c_nomb').val('');
    listardatatable_c('%%','%%','%%');
});

/* TODO: Listar datatable_p con filtro avanzado */
function listardatatable_c(sede_id,c_placa,c_nomb){
    tabla=$('#mtoc_data').dataTable({
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
            url: '../../controller/correctivo.php?op=listar_c_filtro',
            type : "post",
            dataType : "json",
            data:{ sede_id:sede_id,c_placa:c_placa,c_nomb:c_nomb},
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
function limpiar_c(){
    $('#table').html(
        "<table id='mtoc_data' class='table table-bordered table-striped table-vcenter js-dataTable-full'>"+
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