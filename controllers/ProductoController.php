<?php

require_once 'models/producto.php';

class productoController{
    
    public function Index(){
        include_once 'views/producto/destacados.php';
    }

     public function gestion(){
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
     }

     public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
     }

        public function save(){
            Utils::isAdmin();
            if(isset($_POST)){
            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;

            if($nombre && $descripcion && $precio && $stock && $categoria){

                $producto = new Producto();

                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoriaId($categoria);


                //GUARDAR IMAGEN
                        $file = $_FILES['imagen'];
                        $filename = $file['name'];
                        $mimetype = $file['type'];

                        if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype='image/gif'){

                            if(!is_dir('uploads/images')){
                                mkdir('uploads/images', 0777, true);
                            }

                            move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                $producto->setImagen($filename);

                }
                //FIN GUARDAR IMAGEN
                
                $save = $producto->save();

                if($save){
                    $_SESSION['producto'] = "complete";
                }else{
                    $_SESSION['producto'] = "failed";
                }

            }else{
                $_SESSION['producto'] = "failed";
            }

            }else{
                $_SESSION['producto'] = "failed";
            }
            header("Location:".base_url."/producto/gestion");
        }



    public function editar(){

        var_dump($_GET);

    }

    public function eliminar(){
        Utils::isAdmin();

        if($_GET['id']){

                $id = $_GET['id'];
                $producto = New Producto();
                $producto->setId($id);
                $producto->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header("Location: ".base_url."/producto/gestion");

    }

}//FIN CLASE

?>