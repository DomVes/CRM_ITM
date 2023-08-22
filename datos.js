function init(){
}

$(document).ready(function() {

});

/* TODO: Script para poder modificar segun el valor de acceso soporte o usuario */
$(document).on("click", "#btnsoporte", function () {
    if ($('#rol_id').val()==1){
        $('#lbltitulo').html("Soporte Sertecopy");
        $('#btnsoporte').html("Usuario");
        $('#rol_id').val(2);
        $("#imgtipo").attr("src","public/2.jpg");
    }else{
        $('#lbltitulo').html("Usuario");
        $('#btnsoporte').html("Soporte Sertecopy");
        $('#rol_id').val(1);
        $("#imgtipo").attr("src","public/1.jpg");
    }
});

init();