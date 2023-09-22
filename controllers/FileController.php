<?php
    //incluimos las consultas
    require_once ("query/FileQuery.php");

    class FileController {

        public $path = "images";

         //Constructor
        public function __construct() {
            $this->query = new FileQuery(); //Intanciamos un objeto de la clase ClienteQuery

            //crear carpeta si no existe
            if (!file_exists ($this->path)) {
                mkdir ($this->path);
            }
        }

        public function Store($request){
            $imagen_name = $request["name"];
            $encrypted = md5(file_get_contents($request["tmp_name"]));

            $rows = array(
                "imagen" => $request["name"],
                "encrypted_file" => $encrypted
            );

            if (!$this->query->ExistsImage($encrypted)) {
                //Guardamos la imagen
                if(!$this->StoreFileServer($request)){
                    echo $this->ResultMensagge("No se guardo la imagen, formato o tamaño invalido intente de nuevo");
                    return false;
                }

                //registramos los datos en la bd
                if ($this->query->Insert($rows)) {
                    echo $this->ResultMensagge("Datos registrados!!!");
                }
            }else {
                echo $this->ResultMensagge("La imagen ya existe!");
            }
        }

        public function StoreFileServer($file){
            $formatos=array('image/jpeg','image/png','image/gif', 'application/pdf'); //formatos de archivos
            $limite_kb=200000; //tamaño del archivo en en base a kb.
            
            //validación de los datos anteriores.
            if(in_array($file["type"], $formatos) && $file["size"] <= $limite_kb){
                $archivo=$this->path."/".$file["name"];                
                $resultado= @move_uploaded_file($file["tmp_name"], $archivo);
                return $resultado;
            }
            return false;
        }

        public function ResultMensagge($mensaje) {
            return '
            <script>
                alert("'.$mensaje.'");
                location.replace("index.php");
            </script>
            ';
        }

        //Obtenemos los registros
        public function Index() {
            return $this->query->Select();
        }
    }
?>