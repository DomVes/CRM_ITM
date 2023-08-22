
function init(){
    $("#correct_form").on("submit",function(e){
        guardaryeditar(e);
    });
}

$(document).ready(function() {

    /* TODO: Llenar Combo Sede */
    $.post("../../controller/sede.php?op=combo",function(data, status){
        $('#sede_id').html(data);
    }); 
    /* TODO: Inicializar SummerNote */
    $('#c_descrip').summernote({
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
    var formData = new FormData($("#correct_form")[0]);
    /* TODO: validamos si los campos tienen informacion antes de guardar */
    if ($('#c_descrip').summernote('isEmpty') || $('#sede_id').val()=='' || $('#c_ubicacion').val() == '' || $('#c_tipoequipo').val() == '' || $('#c_placa').val() == 0 || $('#c_ip').val() ==''
    || $('#c_serial').val() ==''|| $('#c_marca').val() ==''|| $('#c_referencia').val() =='' || $('#c_procesador').val() =='' || $('#c_disco').val() =='' || $('#c_ram').val() =='' || $('#c_so').val() ==''
    || $('#c_vidadisco').val() ==''|| $('#c_tecnico').val() ==''|| $('#c_nomb').val() ==''){
        swal("Advertencia!", "Faltan Campos", "warning");
    }else{       

        /* TODO: Guardar Peventivo */
        $.ajax({
            url: "../../controller/correctivo.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                console.log(datos);                
                swal("Correcto!", "Registrado Correctamente", "success");
            }
        });
    }
}

init();