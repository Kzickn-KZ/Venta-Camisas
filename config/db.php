<?php

class Database{
    public static function connect(){
            $db = new Mysqli('localhost','root','','tienda_master');         
            $db->query("SET NAMES 'utf8'");
            return $db;
}

}

?>