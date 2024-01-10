<?php

    include('../app/config.php');
    $nombre =$_POST['nombre'];
    $email  =$_POST['email'];
    $id_user =$_POST['id_user'];
    $rol =$_POST['rol'];

    date_default_timezone_set("America/Mexico_City");
    $fechahora = date("Y-m-d h:i:s");
    //echo $nombres."-".$email."-".$passworduser;

    $sentencia = $pdo -> prepare ("UPDATE tb_usuarios SET
    rol = :rol
    WHERE id = :id ");
    $sentencia->bindParam(':rol',$rol);
    $sentencia->bindParam(':id',$id_user);

    if($sentencia->execute()){
        echo "Asignacion de Rol Correcto";
        ?>
        <script>location.href = "../roles/asignar.php";</script>
        <?php
    }else{
        echo "No se pudo asignar";
    }
?>
