<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','salonfiestas');

$servidor = "mysql:dbname=".BD."; host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "LA CONEXION A LA BASE DE DATOS FUE EXITOSA";
}catch(PDOException $e){
    //echo "ERROR A LA BASE DE DATOS";
    echo "<script>alert('Error en la conexión a la base de datos');</script>";
}

$URL = 'http://localhost/www.saloneventos.com';

$estado_registro = "1";
?>
