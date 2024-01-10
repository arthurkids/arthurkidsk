<?php
    include('../app/config.php');
    $nombres = $_GET['nombres'];
    $email = $_GET['email'];
    $passworduser = $_GET['passworduser'];
    $id_user = $_GET['id_user'];


    $sentencia = $pdo -> prepare ("UPDATE tb_usuarios SET
    nombres = :nombres, 
    email = :email, 
    contraseña = :passworduser,
    WHERE id = :id ");
    $sentencia->bindParam(':nombres',$nombres);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':passworduser',$passworduser);
    $sentencia->bindParam(':id',$id_user);

    if($sentencia->execute()){
        echo "Actualización exitosa";
        ?>
        <script>location.href = "index.php";</script>
        <?php
    }else{
        echo "No se pudo registar";
    }
?>