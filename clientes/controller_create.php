<?php
    include('../app/config.php');
    $nombre = $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $email =$_POST['email'];
    $telefono = $_POST['telefono'];


    date_default_timezone_set("America/Mexico_City");
    $fechahora = date("Y-m-d h:i:s");
    $sentencia = $pdo -> prepare ("INSERT INTO tb_clientes
            (nombre, apellido, email, telefono,estado) 
     VALUES (:nombre, :apellido, :email, :telefono, :estado) ");
    $sentencia->bindParam('nombre',$nombre);
    $sentencia->bindParam('apellido',$apellido);
    $sentencia->bindParam('email',$email);
    $sentencia->bindParam('telefono',$telefono);
    $sentencia->bindParam('estado',$estado_registro);

    if($sentencia->execute()){
        echo "Registro exitoso";
        ?>
        <script>location.href = "../clientes/index.php";</script>
        <?php
    }else{
        echo "No se pudo registar";
    }
?>