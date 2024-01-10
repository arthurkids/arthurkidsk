<?php
    include('../app/config.php');
    $nombre = $_POST['nombre'];

    date_default_timezone_set("America/Mexico_City");
    $fechahora = date("Y-m-d h:i:s");
    $sentencia = $pdo -> prepare ("INSERT INTO tb_roles
            (nombre,f_h_creacion,estado) 
     VALUES (:nombre,:f_h_creacion, :estado) ");
    $sentencia->bindParam('nombre',$nombre);
    $sentencia->bindParam('f_h_creacion',$fechahora);
    $sentencia->bindParam('estado',$estado_registro);

    if($sentencia->execute()){
        echo "Registro exitoso";
        ?>
        <script>location.href = "index.php";</script>
        <?php
    }else{
        echo "No se pudo registar";
    }
?>