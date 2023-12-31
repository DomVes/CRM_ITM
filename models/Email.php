<?php
/*TODO: librerias necesarias para que el proyecto pueda enviar emails */

use PHPMailer\PHPMailer\PHPMailer;

require '../Phpmailer/src/Exception.php';
require '../Phpmailer/src/PHPMailer.php';
require '../Phpmailer/src/SMTP.php';


/*TODO: llamada de las clases necesarias que se usaran en el envio del mail */
require_once("../config/conexion.php");
require_once("../models/Ticket.php");

class Email extends PHPMailer{

    //TODO: variable que contiene el correo y contraseña del destinatario
    protected $gCorreo = '';
    protected $gContrasena = '';

    /* TODO:Alertar al momento de generar un ticket */
    public function ticket_abierto($tick_id){

        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }

        //IGual//
        $this->IsSMTP();
        $this->Host ='smtp.hostinger.com';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->SMTPSecure = 'ssl'; //Aqui la seguridad si es SSL o TLS
        $this->FromName = $this->gCorreo = "Ticket Abierto ".$id;
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->addAddress($_SESSION["usu_email"]);
        $this->addAddress('');
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Ticket Abierto";
        //Igual//
        $cuerpo = file_get_contents('../public/NuevoTicket.html'); /*TODO:  Ruta del template en formato HTML */
        /*TODO:  parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Abierto");
        return $this->Send();
    }

    /* TODO:Alertar al momento de Cerrar un ticket */
    public function ticket_cerrado($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }

        //IGual//
        $this->IsSMTP();
        $this->Host ='smtp.hostinger.com';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->SMTPSecure = 'ssl'; //Aqui la seguridad si es SSL o TLS
        $this->FromName = $this->gCorreo = "Ticket Cerrado ".$id;
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->addAddress($_SESSION["usu_correo"]);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Ticket Cerrado";
        //Igual//
        $cuerpo = file_get_contents('../public/CerradoTicket.html'); /*TODO:  Ruta del template en formato HTML */
        /*TODO:  parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Cerrado");
        return $this->Send();
    }

    /* TODO:Alertar al momento de Asignar un ticket */
    public function ticket_asignado($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }

        //IGual//
        $this->IsSMTP();
        $this->Host ='smtp.hostinger.com';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->SMTPSecure = 'ssl'; //Aqui la seguridad si es SSL o TLS
        $this->FromName = $this->gCorreo = "Ticket Asignado ".$id;
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->addAddress($_SESSION["usu_correo"]);
        $this->addAddress('');
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Ticket Asignado";
        //Igual//
        $cuerpo = file_get_contents('../public/AsignarTicket.html'); /*TODO:  Ruta del template en formato HTML */
        /*TODO:  parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Asignado");
        return $this->Send();
    }

}

?>