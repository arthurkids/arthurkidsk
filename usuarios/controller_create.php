<?php
    include('../app/config.php');
    $nombres = $_POST['nombres'];
    $email = $_POST['email'];
    $passworduser = $_POST['passworduser'];

    date_default_timezone_set("America/Mexico_City");
    $fechahora = date("Y-m-d h:i:s");
    //echo $nombres."-".$email."-".$passworduser;
    $sentencia = $pdo -> prepare ("INSERT INTO tb_usuarios
            (nombres, email, contraseña, f_h_creacion,estado) 
     VALUES (:nombres, :email, :passworduser, :f_h_creacion, :estado) ");
    $sentencia->bindParam('nombres',$nombres);
    $sentencia->bindParam('email',$email);
    $sentencia->bindParam('passworduser',$passworduser);
    $sentencia->bindParam('f_h_creacion',$fechahora);
    $sentencia->bindParam('estado',$estado_registro);

    if($sentencia->execute()){
        echo "Registro exitoso";
        ?>
        <script>location.href = "../roles/asignar.php";</script>
        <?php
    }else{
        echo "No se pudo registar";
    }
?>