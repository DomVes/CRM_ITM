
function init(){
    $("#prev_form").on("submit",function(e){
        guardaryeditar(e);
    });
}

$(document).ready(function() {

    /* TODO: Llenar Combo Sede */
    $.post("../../controller/sede.php?op=combo",function(data, status){
        $('#sede_id').html(data);
    }); 
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
});

function guardaryeditar(e){
    e.preventDefault();
    /* TODO: Array del form preventivo */
    var formData = new FormData($("#prev_form")[0]);
    /* TODO: validamos si los campos tienen informacion antes de guardar */
    if ($('#p_descrip').summernote('isEmpty') || $('#sede_id').val()=='' || $('#p_ubicacion').val() == '' || $('#p_tipoequipo').val() == '' || $('#p_placa').val() == 0 || $('#p_ip').val() ==''
    || $('#p_serial').val() ==''|| $('#p_marca').val() ==''|| $('#p_referencia').val() =='' || $('#p_procesador').val() =='' || $('#p_disco').val() =='' || $('#p_ram').val() =='' || $('#p_so').val() ==''
    || $('#p_vidadisco').val() ==''|| $('#p_tecnico').val() ==''|| $('#p_nomb').val() == ''){
        swal("Advertencia!", "Faltan Campos", "warning");
    }else{      
        /* TODO: Guardar Peventivo */
        $.ajax({
            url: "../../controller/preventivo.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                $('#prev_form')[0].reset();                               
                swal("Correcto!", "Registrado Correctamente", "success");
            }
        });
    }
}

init();