<?php 
    //Creando conexion a base de datos.
    class Conexion {
        public static function ConectarDB() {
            $hostName = 'localhost';
            $dataBase = 'db_archivos';
            $user = 'root';
            $password = '';
            
            $pdo = new PDO("mysql:host=$hostName;dbname=$dataBase;", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }
?>