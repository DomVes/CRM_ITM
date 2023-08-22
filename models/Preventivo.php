<?php
    class Preventivo extends Conectar{

        /* TODO: insertar nuevo preventivo */
        public function insert_prev($usu_id,$sede_id,$p_ubicacion,$p_tipoequipo,$p_placa,$p_nomb,$p_ip,
        $p_serial,$p_marca,$p_referencia,$p_procesador,$p_disco,$p_ram,
        $p_so,$p_vidadisco,$p_tecnico,$p_descrip
        ){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO mto_preventivos(
                p_id,
                usu_id, 
                sede_id, 
                p_ubicacion, 
                p_tipoequipo, 
                p_placa, 
                p_nomb,
                p_ip, 
                p_serial, 
                p_marca, 
                p_referencia, 
                p_procesador, 
                p_disco, 
                p_ram, 
                p_so, 
                p_vidadisco,
                p_fecha, 
                p_tecnico, 
                p_descrip) 
                VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);            
            $sql->bindValue(2, $sede_id);
            $sql->bindValue(3, $p_ubicacion);
            $sql->bindValue(4, $p_tipoequipo);
            $sql->bindValue(5, $p_placa);
            $sql->bindValue(6,$p_nomb);
            $sql->bindValue(7, $p_ip);
            $sql->bindValue(8, $p_serial);
            $sql->bindValue(9, $p_marca);
            $sql->bindValue(10, $p_referencia);
            $sql->bindValue(11, $p_procesador);
            $sql->bindValue(12, $p_disco);
            $sql->bindValue(13, $p_ram);
            $sql->bindValue(14, $p_so);
            $sql->bindValue(15, $p_vidadisco);            
            $sql->bindValue(16, $p_tecnico);
            $sql->bindValue(17, $p_descrip);
            $sql->execute();
            $sql1="select last_insert_id() as 'p_id';";
            $sql1=$conectar->prepare($sql1);
            $sql1->execute();
            return $resultado=$sql1->fetchAll(pdo::FETCH_ASSOC);
        }
        /* Actualzar Preventivo*/
        public function update_prev(
                                    $p_ubicacion,
                                    $p_nomb,
                                    $p_ip,                                    
                                    $p_disco,
                                    $p_so,
                                    $p_vidadisco,
                                    $p_tecnico,
                                    $p_descrip,
                                    $p_id
                                    )
        {
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE mto_preventivos SET   
                p_ubicacion = ?,
                p_nomb = ?,
                p_ip = ?,            
                p_disco = ?,
                p_so = ?,
                p_vidadisco = ?,
                p_fecha =  now(),
                p_tecnico =  ?,
                p_descrip = ?
                WHERE p_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $p_ubicacion);
            $sql->bindValue(2, $p_nomb);
            $sql->bindValue(3, $p_ip);            
            $sql->bindValue(4, $p_disco);
            $sql->bindValue(5, $p_so);
            $sql->bindValue(6, $p_vidadisco);            
            $sql->bindValue(7, $p_tecnico);
            $sql->bindValue(8, $p_descrip);
            $sql->bindValue(9, $p_id);
            $sql->execute();           
            return $resultado=$sql->fetchAll();
        }
        /* TODO: Mostrar todos los preventivos */
        public function get_prev_x_id($p_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT
            mto_preventivos.p_id,
            mto_preventivos.sede_id,             
            tm_sede.sede_nom,
            mto_preventivos.p_id,
            mto_preventivos.p_ubicacion,
            mto_preventivos.p_tipoequipo,
            mto_preventivos.p_placa,
            mto_preventivos.p_nomb,
            mto_preventivos.p_ip,
            mto_preventivos.p_serial,
            mto_preventivos.p_marca,
            mto_preventivos.p_referencia,
            mto_preventivos.p_procesador,
            mto_preventivos.p_disco,
            mto_preventivos.p_ram,
            mto_preventivos.p_so,
            mto_preventivos.p_vidadisco,
            mto_preventivos.p_fecha,
            mto_preventivos.p_tecnico            
            FROM mto_preventivos
            INNER JOIN tm_usuario ON mto_preventivos.usu_id = tm_usuario.usu_id
            INNER JOIN tm_sede ON mto_preventivos.sede_id = tm_sede.sede_id
            WHERE p_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $p_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }       
        /* TODO: Obtener total de preventivos */
        public function get_prev_total(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM mto_preventivos";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }            
        /* TODO: Filtro Avanzado de preventivo */
        public function filtrar_prev($sede_id,$p_placa,$p_nomb){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            mto_preventivos.p_id,            
            tm_sede.sede_nom,			
            mto_preventivos.p_ubicacion,
            mto_preventivos.p_tipoequipo,
            mto_preventivos.p_placa,
            mto_preventivos.p_nomb,
            mto_preventivos.p_ip,
            mto_preventivos.p_serial,
            mto_preventivos.p_marca,
            mto_preventivos.p_referencia,
            mto_preventivos.p_procesador,
            mto_preventivos.p_disco,
            mto_preventivos.p_ram,
            mto_preventivos.p_so,
            mto_preventivos.p_vidadisco,
            mto_preventivos.p_fecha,
            mto_preventivos.p_tecnico,
            mto_preventivos.p_descrip
            FROM mto_preventivos
                INNER JOIN tm_usuario ON mto_preventivos.usu_id = tm_usuario.usu_id
				INNER JOIN tm_sede ON mto_preventivos.sede_id = tm_sede.sede_id
                WHERE
                p_id > 0
                AND 
                (mto_preventivos.sede_id LIKE ?
                OR mto_preventivos.p_placa LIKE ?
                OR mto_preventivos.p_nomb LIKE ?)";
                
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sede_id);
            $sql->bindValue(2, $p_placa);
            $sql->bindValue(3, $p_nomb);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        /* TODO: Filtro Avanzado de preventivo */
        public function filtrar_prev_informes($sede_id,$p_placa,$p_nomb){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            mto_preventivos.p_id,            
            tm_sede.sede_nom,			
            mto_preventivos.p_ubicacion,
            mto_preventivos.p_tipoequipo,
            mto_preventivos.p_placa,
            mto_preventivos.p_nomb,
            mto_preventivos.p_ip,
            mto_preventivos.p_serial,
            mto_preventivos.p_marca,
            mto_preventivos.p_referencia,
            mto_preventivos.p_procesador,
            mto_preventivos.p_disco,
            mto_preventivos.p_ram,
            mto_preventivos.p_so,
            mto_preventivos.p_vidadisco,
            mto_preventivos.p_fecha,
            mto_preventivos.p_tecnico,
            mto_preventivos.p_descrip
            FROM mto_preventivos
                INNER JOIN tm_usuario ON mto_preventivos.usu_id = tm_usuario.usu_id
				INNER JOIN tm_sede ON mto_preventivos.sede_id = tm_sede.sede_id
                WHERE
                p_id > 0
                AND 
                (mto_preventivos.sede_id LIKE ?
                OR mto_preventivos.p_placa LIKE ?
                OR mto_preventivos.p_nomb LIKE ?)";
                
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sede_id);
            $sql->bindValue(2, $p_placa);
            $sql->bindValue(3, $p_nomb);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>