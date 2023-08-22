<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo Categoria */
    require_once("../models/Sede.php");
    $sede = new Sede();

    /*TODO: opciones del controlador Categoria*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo cat_id esta vacio */
        case "guardaryeditar":
            /* TODO:Actualizar si el campo cat_id tiene informacion */
            if(empty($_POST["sede_id"])){       
                $sede->insert_sede($_POST["sede_nom"]);     
            }
            else {
                $sede->update_sede($_POST["sede_id"],$_POST["sede_nom"]);
            }
            break;

        /* TODO: Listado de categoria segun formato json para el datatable */
        case "listar":
            $datos=$sede->get_sede();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["sede_nom"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["sede_id"].');"  id="'.$row["sede_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["sede_id"].');"  id="'.$row["sede_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        /* TODO: Actualizar estado a 0 segun id de categoria */
        case "eliminar":
            $sede->delete_sede($_POST["sede_id"]);
            break;

        /* TODO: Mostrar en formato JSON segun sede_id */
        case "mostrar";
            $datos=$sede->get_sede_x_id($_POST["sede_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sede_id"] = $row["sede_id"];
                    $output["sede_nom"] = $row["sede_nom"];
                }
                echo json_encode($output);
            }
            break;

        /* TODO: Formato para llenar combo en formato HTML */
        case "combo":
            $datos = $sede->get_sede();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sede_id']."'>".$row['sede_nom']."</option>";
                }
                echo $html;
            }
            break;
    }
?>