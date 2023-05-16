<?php

require_once 'models/categoria.php';

class categoriaController{
    
    public function Index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }


    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){

        $categoria = new Categoria();
        $categoria->setNombre($_POST['nombre']);
        $save = $categoria->save();

    }
    header("Location: ".base_url."/categoria/index");

    }



}//FIN CLASE

?>