<?php
    //incluimos clase para la conexion a base  de datos
    require_once ("database/Conexion.php");

    class FileQuery {
        
        //Obtener datos de la base de 
        public function Select() {
            try {
                $db = Conexion::ConectarDB(); //Objeto de conexion a base de datos
                $select = $db->prepare("SELECT * FROM files");
                $select->execute();
                return $select->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Insertar las imagenes en la base de datos
        public function Insert($rows) {
            try {
                $db = Conexion::ConectarDB();
                $insert = $db->prepare("INSERT INTO files (id, file_name, encrypted_file) VALUES (NULL, ?, ?)");
                $insert->bindParam(1, $rows["imagen"], PDO::PARAM_STR);
                $insert->bindParam(2, $rows["encrypted_file"], PDO::PARAM_STR);
                $insert->execute();
                return true;
            } catch (Exception $e) {
                die($e->getMessage());
                return false;
            }
            return false;
        }

        // evitar imagenes repetidas
        public function ExistsImage($encrypted_file){
            try {
                $db = Conexion::ConectarDB();
                $select = $db->prepare("SELECT * FROM files WHERE encrypted_file = ?");
                $select->bindParam(1, $encrypted_file, PDO::PARAM_STR);
                $select->execute();
                $select->fetchAll(PDO::FETCH_OBJ);

                if($select->rowCount() > 0) {
                    return true;
                }

                return false;
            } catch (Exception $e) {
                die($e->getMessage());
                return false;
            }
            return false;
        }
    }
?>