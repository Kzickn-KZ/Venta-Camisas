<?php

class Usuario{

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    public function __construct(){

        $this->db = Database::connect();
    
    }
    
    

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);

    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    /**
     * Set the value of password
     */
    public function setPassword($password)
    {
        $this->password = $password;

    }

    /**
     * Get the value of error
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of error
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
        $save = $this->db->query($sql);
            $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }


    public function login(){

        $resultado = false;
        $email = $this->email;
        $password = $this->password;

        //COMPROBAR SI EXISTE EL USUARIO
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $login = $this->db->query($sql);    

        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();

            //VERIFICAR CONTRASEÑA
            $verify = password_verify($password, $usuario->password);
            if($verify){
                $resultado = $usuario;
            } 
        }
        return $resultado;
    }        
        

    
}

?>