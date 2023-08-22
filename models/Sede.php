<?php
    class Sede extends Conectar{

        /* TODO: Obtener todos los registros */
        public function get_sede(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sede WHERE sede_est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Insert Registro*/
        public function insert_sede($sede_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_sede (sede_id, sede_nom, sede_est) VALUES (NULL,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sede_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Update Registro*/
        public function update_sede($sede_id,$sede_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sede set
                sede_nom = ?
                WHERE
                sede_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sede_nom);
            $sql->bindValue(2, $sede_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Delete Registro*/
        public function delete_sede($sede_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sede SET
                sede_est = 0
                WHERE 
                sede_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sede_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Registro x id */
        public function get_sede_x_id($sede_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sede WHERE sede_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sede_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>