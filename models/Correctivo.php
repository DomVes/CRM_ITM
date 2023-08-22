<?php
    class Correctivo extends Conectar{

        /* TODO: insertar nuevo correctivo */
        public function insert_correct($usu_id,$sede_id,$c_ubicacion,$c_tipoequipo,$c_placa,$c_nomb,$c_ip,
        $c_serial,$c_marca,$c_referencia,$c_procesador,$c_disco,$c_ram,
        $c_so,$c_vidadisco,$c_tecnico,$c_descrip
        ){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO mto_correctivos(
                c_id,
                usu_id, 
                sede_id, 
                c_ubicacion, 
                c_tipoequipo, 
                c_placa, 
                c_nomb,
                c_ip, 
                c_serial, 
                c_marca, 
                c_referencia, 
                c_procesador, 
                c_disco, 
                c_ram, 
                c_so, 
                c_vidadisco,
                c_fecha, 
                c_tecnico, 
                c_descrip) 
                VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);            
            $sql->bindValue(2, $sede_id);
            $sql->bindValue(3, $c_ubicacion);
            $sql->bindValue(4, $c_tipoequipo);
            $sql->bindValue(5, $c_placa);
            $sql->bindValue(6,$c_nomb);
            $sql->bindValue(7, $c_ip);
            $sql->bindValue(8, $c_serial);
            $sql->bindValue(9, $c_marca);
            $sql->bindValue(10, $c_referencia);
            $sql->bindValue(11, $c_procesador);
            $sql->bindValue(12, $c_disco);
            $sql->bindValue(13, $c_ram);
            $sql->bindValue(14, $c_so);
            $sql->bindValue(15, $c_vidadisco);            
            $sql->bindValue(16, $c_tecnico);
            $sql->bindValue(17, $c_descrip);
            $sql->execute();
            $sql1="select last_insert_id() as 'c_id';";
            $sql1=$conectar->prepare($sql1);
            $sql1->execute();
            return $resultado=$sql1->fetchAll(pdo::FETCH_ASSOC);
        }

        /* TODO: Filtro Avanzado de preventivo */
        public function filtrar_c_informes($sede_id,$c_placa,$c_nomb){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            mto_correctivos.c_id,            
            tm_sede.sede_nom,			
            mto_correctivos.c_ubicacion,
            mto_correctivos.c_tipoequipo,
            mto_correctivos.c_placa,
            mto_correctivos.c_nomb,
            mto_correctivos.c_ip,
            mto_correctivos.c_serial,
            mto_correctivos.c_marca,
            mto_correctivos.c_referencia,
            mto_correctivos.c_procesador,
            mto_correctivos.c_disco,
            mto_correctivos.c_ram,
            mto_correctivos.c_so,
            mto_correctivos.c_vidadisco,
            mto_correctivos.c_fecha,
            mto_correctivos.c_tecnico,
            mto_correctivos.c_descrip
            FROM mto_correctivos
                INNER JOIN tm_usuario ON mto_correctivos.usu_id = tm_usuario.usu_id
				INNER JOIN tm_sede ON mto_correctivos.sede_id = tm_sede.sede_id
                WHERE
                c_id > 0
                AND 
                (mto_correctivos.sede_id LIKE ?
                OR mto_correctivos.c_placa LIKE ?
                OR mto_correctivos.c_nomb LIKE ?)";                
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sede_id);
            $sql->bindValue(2, $c_placa);
            $sql->bindValue(3, $c_nomb);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        /* TODO: Listar preventivo segun id de usuario */
        public function listar_c_x_usu($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            mto_correctivos.c_id,            
            tm_sede.sede_nom,			
            mto_correctivos.c_ubicacion,
            mto_correctivos.c_tipoequipo,
            mto_correctivos.c_placa,
            mto_correctivos.c_nomb,
            mto_correctivos.c_ip,
            mto_correctivos.c_serial,
            mto_correctivos.c_marca,
            mto_correctivos.c_referencia,
            mto_correctivos.c_procesador,
            mto_correctivos.c_disco,
            mto_correctivos.c_ram,
            mto_correctivos.c_so,
            mto_correctivos.c_vidadisco,
            mto_correctivos.c_fecha,
            mto_correctivos.c_tecnico,
            mto_correctivos.c_descrip
            FROM mto_correctivos
                INNER JOIN tm_usuario ON mto_correctivos.usu_id = tm_usuario.usu_id
				INNER JOIN tm_sede ON mto_correctivos.sede_id = tm_sede.sede_id
                WHERE
            tm_usuario.usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }       

        /* TODO: Mostrar todos los correctivos */
        public function listar_correct(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            mto_correctivos.c_id,            
            tm_sede.sede_nom,			
            mto_correctivos.c_ubicacion,
            mto_correctivos.c_tipoequipo,
            mto_correctivos.c_placa,
            mto_correctivos.c_nomb,
            mto_correctivos.c_ip,
            mto_correctivos.c_serial,
            mto_correctivos.c_marca,
            mto_correctivos.c_referencia,
            mto_correctivos.c_procesador,
            mto_correctivos.c_disco,
            mto_correctivos.c_ram,
            mto_correctivos.c_so,
            mto_correctivos.c_vidadisco,
            mto_correctivos.c_fecha,
            mto_correctivos.c_tecnico,
            mto_correctivos.c_descrip
            FROM mto_correctivos
            INNER JOIN tm_usuario ON mto_correctivos.usu_id = tm_usuario.usu_id
			INNER JOIN tm_sede ON mto_correctivos.sede_id = tm_sede.sede_id";                                       
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }       
        /* TODO: Obtener total de correctivos */
        public function get_correct_total(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM mto_correctivos";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 
        /* TODO: Filtro Avanzado de correctivos */
        public function filtrar_correct($sede_id,$c_placa,$c_nomb){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            mto_correctivos.sede_id,
            tm_sede.sede_nom,
            mto_correctivos.c_ubicacion,
            mto_correctivos.c_tipoequipo,
            mto_correctivos.c_placa,
            mto_correctivos.c_nomb,
            mto_correctivos.c_ip,
            mto_correctivos.c_serial,
            mto_correctivos.c_marca,
            mto_correctivos.c_referencia,
            mto_correctivos.c_procesador,
            mto_correctivos.c_disco,
            mto_correctivos.c_ram,
            mto_correctivos.c_so,
            mto_correctivos.c_vidadisco,
            mto_correctivos.c_fecha,
            mto_correctivos.c_tecnico,
            mto_correctivos.c_descrip
            FROM mto_correctivos
                INNER JOIN tm_usuario ON mto_correctivos.usu_id = tm_usuario.usu_id
				INNER JOIN tm_sede ON mto_correctivos.sede_id = tm_sede.sede_id
                WHERE
                c_id > 0
                AND 
                (mto_correctivos.sede_id LIKE ?
                OR mto_correctivos.c_placa LIKE ?
                OR mto_correctivos.c_nomb LIKE ?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sede_id);
            $sql->bindValue(2, $c_placa);
            $sql->bindValue(3, $c_nomb);
            $sql->execute();
            return $resultado=$sql->fetchAll();

        }
        

    }
?>