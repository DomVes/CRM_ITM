<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Clases Necesarias */
    require_once("../models/Preventivo.php");
    $prev = new Preventivo();

    require_once("../models/Sede.php");
    $sede = new Sede();

    require_once("../models/Usuario.php");
    $usuario = new Usuario();   

    /*TODO: opciones del controlador Preventivo*/
    switch($_GET["op"]){

        /* TODO: Insertar nuevo Preventivo */
        case "insert":
            $datos=$prev->insert_prev(  $_POST["usu_id"],$_POST["sede_id"],$_POST["p_ubicacion"],$_POST["p_tipoequipo"],$_POST["p_placa"],$_POST["p_nomb"],
                                        $_POST["p_ip"],$_POST["p_serial"],$_POST["p_marca"],$_POST["p_referencia"],$_POST["p_procesador"],
                                        $_POST["p_disco"],$_POST["p_ram"],$_POST["p_so"],$_POST["p_vidadisco"],$_POST["p_tecnico"],$_POST["p_descrip"]);
            echo json_encode($datos);
            break;       
        /* TODO: Listado de preventivos,formato json para Datatable JS, filtro avanzado para administrar*/
        case "listar_p_filtro":
            $datos=$prev->filtrar_prev($_POST["sede_id"],$_POST["p_placa"],$_POST["p_nomb"]);
                    $data= Array();
                    foreach($datos as $row){
                        $sub_array = array();
                        $sub_array[] = $row["sede_nom"];
                        $sub_array[] = $row["p_ubicacion"];
                        $sub_array[] = $row["p_marca"];
                        $sub_array[] = $row["p_referencia"];
                        $sub_array[] = $row["p_tipoequipo"];
                        $sub_array[] = $row["p_serial"];  
                        $sub_array[] = $row["p_nomb"];
                        $sub_array[] = '<button type="button" onClick="editar('.$row["p_id"].');"  id="'.$row["p_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                        $sub_array[] = $row["p_placa"]; 
                        $sub_array[] = $row["p_ip"];
                        $sub_array[] = $row["p_procesador"];
                        $sub_array[] = $row["p_disco"];
                        $sub_array[] = $row["p_ram"];
                        $sub_array[] = $row["p_so"];  
                        $sub_array[] = $row["p_vidadisco"]; 
                        $sub_array[] = date("d/m/Y", strtotime($row["p_fecha"])); 
                        $sub_array[] = $row["p_tecnico"];         
                        $sub_array[] = $row["p_descrip"]; 
                        $data[] = $sub_array;              
                    }
                    $results = array(
                        "sEcho"=>1,
                        "iTotalRecords"=>count($data),
                        "iTotalDisplayRecords"=>count($data),
                        "aaData"=>$data);
                    echo json_encode($results);
                break;
        /* TODO: Listado de preventivos,formato json para Datatable JS, filtro avanzado para informes*/
        case "listar_p_informes":
            $datos=$prev->filtrar_prev_informes($_POST["sede_id"],$_POST["p_placa"],$_POST["p_nomb"]);
                    $data= Array();
                    foreach($datos as $row){
                        $sub_array = array();
                        $sub_array[] = $row["sede_nom"];
                        $sub_array[] = $row["p_ubicacion"];
                        $sub_array[] = $row["p_marca"];
                        $sub_array[] = $row["p_referencia"];
                        $sub_array[] = $row["p_tipoequipo"];
                        $sub_array[] = $row["p_serial"];
                        $sub_array[] = $row["p_nomb"];                        
                        $sub_array[] = $row["p_placa"]; 
                        $sub_array[] = $row["p_ip"];                       
                        $sub_array[] = $row["p_procesador"];
                        $sub_array[] = $row["p_disco"];
                        $sub_array[] = $row["p_ram"];
                        $sub_array[] = $row["p_so"];  
                        $sub_array[] = $row["p_vidadisco"]; 
                        $sub_array[] = date("d/m/Y", strtotime($row["p_fecha"])); 
                        $sub_array[] = $row["p_tecnico"];         
                        $sub_array[] = $row["p_descrip"]; 
                        $data[] = $sub_array;              
                    }
                    $results = array(
                        "sEcho"=>1,
                        "iTotalRecords"=>count($data),
                        "iTotalDisplayRecords"=>count($data),
                        "aaData"=>$data);
                    echo json_encode($results);
                break;
        


        /* TODO: Listado de preventivos,formato json para Datatable JS */
        case "mostrar":
            $datos=$prev->get_prev_x_id($_POST["p_id"]);            
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["p_id"] = $row["p_id"]; 
                    $output["p_ubicacion"] = $row["p_ubicacion"];               
                    $output["p_nomb"] = $row["p_nomb"]; 
                    $output["p_ip"] = $row["p_ip"];
                    $output["p_disco"] = $row["p_disco"];
                    $output["p_ram"] = $row["p_ram"];
                    $output["p_so"] = $row["p_so"];  
                    $output["p_vidadisco"] = $row["p_vidadisco"];
                    $output["p_tecnico"] = $row["p_tecnico"];
                }
                echo json_encode($output);
                }
                    break;           
            
        /* TODO: Total de preventivos para vista de soporte */
        case "totalpreventivos";
            $datos=$prev->get_prev_total();  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
            break;  
            
        /* TODO: Guardar y editar, guardar si el campo p_id esta vacio */
        case "guardaryeditar":
            if(empty($_POST["p_id"])){       
                $prev->insert_prev( $_POST["usu_id"],$_POST["sede_id"],$_POST["p_ubicacion"],$_POST["p_tipoequipo"],$_POST["p_placa"],$_POST["p_nomb"],
                                    $_POST["p_ip"],$_POST["p_serial"],$_POST["p_marca"],$_POST["p_referencia"],$_POST["p_procesador"],
                                    $_POST["p_disco"],$_POST["p_ram"],$_POST["p_so"],$_POST["p_vidadisco"],$_POST["p_tecnico"],$_POST["p_descrip"]);     
            }
            else {
                $prev->update_prev( 
                                    $_POST["p_ubicacion"],
                                    $_POST["p_nomb"],
                                    $_POST["p_ip"],
                                    $_POST["p_disco"],
                                    $_POST["p_so"],
                                    $_POST["p_vidadisco"],
                                    $_POST["p_tecnico"],
                                    $_POST["p_descrip"],
                                    $_POST["p_id"],
                                    );
            }
            break;               
        /* TODO: Formato para llenar combo sedes en formato HTML */
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