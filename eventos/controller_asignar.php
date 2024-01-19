<?php

    include('../app/config.php');
    $nombre = $_POST['nombre_evento'];
    $fecha = $_POST['f_evento'];
    $horaini = $_POST['h_ini_evento'];
    $horafin = $_POST['h_fin_evento'];
    $personas = $_POST['personas'];
    $salon = $_POST['salon'];
    $id_evento = $_POST['id_evento'];



    $sentencia = $pdo -> prepare ("UPDATE tb_eventos SET
    salon = :salon
    WHERE id_evento = :id_evento ");
    $sentencia->bindParam(':salon',$salon);
    $sentencia->bindParam(':id_evento',$id_evento);

    if($sentencia->execute()){
        echo "Asignacion de Rol Correcto";
        ?>
        <script>location.href = "../eventos/asignar.php";</script>
        <?php
    }else{
        echo "No se pudo asignar";
    }
?>
