<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Clases Necesarias */
    require_once("../models/Correctivo.php");
    $correct = new Correctivo();

    require_once("../models/Usuario.php");
    $usuario = new Usuario();   
    /*TODO: opciones del controlador Correctivo*/
    switch($_GET["op"]){
   /* TODO: Insertar nuevo Correctivo */
        case "insert":
            $datos=$correct->insert_correct($_POST["usu_id"],$_POST["sede_id"],$_POST["c_ubicacion"],$_POST["c_tipoequipo"],$_POST["c_placa"],$_POST["c_nomb"],
                                        $_POST["c_ip"],$_POST["c_serial"],$_POST["c_marca"],$_POST["c_referencia"],$_POST["c_procesador"],
                                        $_POST["c_disco"],$_POST["c_ram"],$_POST["c_so"],$_POST["c_vidadisco"],$_POST["c_tecnico"],$_POST["c_descrip"]);
            echo json_encode($datos);
            break;        

        /* TODO: Listado de correctivos segun sede,formato json para Datatable JS */
        case "listar_c_x_usu":
            $datos=$correct->listar_c_x_usu($_POST["usu_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["sede_id"];
                $sub_array[] = $row["c_ubicacion"];
                $sub_array[] = $row["c_marca"];
                $sub_array[] = $row["c_referencia"];
                $sub_array[] = $row["c_tipoequipo"];
                $sub_array[] = $row["c_serial"];
                $sub_array[] = $row["c_nomb"];
                $sub_array[] = $row["c_placa"];                
                $sub_array[] = $row["c_ip"];
                $sub_array[] = $row["c_procesador"];
                $sub_array[] = $row["c_disco"];
                $sub_array[] = $row["c_ram"];
                $sub_array[] = $row["c_so"];  
                $sub_array[] = $row["c_vidadisco"]; 
                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["c_fecha"])); 
                $sub_array[] = $row["c_tecnico"];         
                $sub_array[] = $row["c_descrip"];                          
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
         case "listar_c_informes":
            $datos=$correct->filtrar_c_informes($_POST["sede_id"],$_POST["c_placa"],$_POST["c_nomb"]);
                    $data= Array();
                    foreach($datos as $row){
                        $sub_array = array();
                        $sub_array[] = $row["sede_nom"];
                        $sub_array[] = $row["c_ubicacion"];
                        $sub_array[] = $row["c_marca"];
                        $sub_array[] = $row["c_referencia"];
                        $sub_array[] = $row["c_tipoequipo"];
                        $sub_array[] = $row["c_serial"];
                        $sub_array[] = $row["c_nomb"];                        
                        $sub_array[] = $row["c_placa"]; 
                        $sub_array[] = $row["c_ip"];                       
                        $sub_array[] = $row["c_procesador"];
                        $sub_array[] = $row["c_disco"];
                        $sub_array[] = $row["c_ram"];
                        $sub_array[] = $row["c_so"];  
                        $sub_array[] = $row["c_vidadisco"]; 
                        $sub_array[] = date("d/m/Y", strtotime($row["c_fecha"])); 
                        $sub_array[] = $row["c_tecnico"];         
                        $sub_array[] = $row["c_descrip"]; 
                        $data[] = $sub_array;              
                    }
                    $results = array(
                        "sEcho"=>1,
                        "iTotalRecords"=>count($data),
                        "iTotalDisplayRecords"=>count($data),
                        "aaData"=>$data);
                    echo json_encode($results);
                break;

        /* TODO: Listado de correctivos,formato json para Datatable JS, filtro avanzado*/
        case "listar_c_filtro":
            $datos=$correct->filtrar_correct($_POST["sede_id"],$_POST["c_placa"],$_POST["c_nomb"]);
                    $data= Array();
                    foreach($datos as $row){
                        $sub_array = array();
                            $sub_array[] = $row["sede_nom"];
                            $sub_array[] = $row["c_ubicacion"];
                            $sub_array[] = $row["c_marca"];
                            $sub_array[] = $row["c_referencia"];
                            $sub_array[] = $row["c_tipoequipo"];
                            $sub_array[] = $row["c_serial"];
                            $sub_array[] = $row["c_nomb"];
                            $sub_array[] = $row["c_placa"];                
                            $sub_array[] = $row["c_ip"];
                            $sub_array[] = $row["c_procesador"];
                            $sub_array[] = $row["c_disco"];
                            $sub_array[] = $row["c_ram"];
                            $sub_array[] = $row["c_so"];  
                            $sub_array[] = $row["c_vidadisco"]; 
                            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["c_fecha"])); 
                            $sub_array[] = $row["c_tecnico"];         
                            $sub_array[] = $row["c_descrip"];                          
                            $data[] = $sub_array;              
                    }
                    $results = array(
                        "sEcho"=>1,
                        "iTotalRecords"=>count($data),
                        "iTotalDisplayRecords"=>count($data),
                        "aaData"=>$data);
                    echo json_encode($results);
            break;
        
        /* TODO: Listado de correctivos,formato json para Datatable JS */
        case "listar":
            $datos=$correct->listar_correct();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                        $sub_array[] = $row["sede_id"];
                        $sub_array[] = $row["c_ubicacion"];
                        $sub_array[] = $row["c_marca"];
                        $sub_array[] = $row["c_referencia"];
                        $sub_array[] = $row["c_tipoequipo"];
                        $sub_array[] = $row["c_serial"];
                        $sub_array[] = $row["c_nomb"];
                        $sub_array[] = $row["c_placa"];                
                        $sub_array[] = $row["c_ip"];
                        $sub_array[] = $row["c_procesador"];
                        $sub_array[] = $row["c_disco"];
                        $sub_array[] = $row["c_ram"];
                        $sub_array[] = $row["c_so"];  
                        $sub_array[] = $row["c_vidadisco"]; 
                        $sub_array[] = date("d/m/Y H:i:s", strtotime($row["c_fecha"])); 
                        $sub_array[] = $row["c_tecnico"];         
                        $sub_array[] = $row["c_descrip"];                          
                        $data[] = $sub_array; 
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
           

        /* TODO: Total de correctivos para vista de soporte */
        case "totalcorrectivos";
            $datos=$correct->get_correct_total();  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
            break;       
        
        /* TODO: Formato Json para grafico de soporte */
        /*case "grafico";
            $datos=$prev->get_prev_grafico();  
            echo json_encode($datos);
            break;  */     

    }
?>