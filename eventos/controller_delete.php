<?php
include('../app/config.php');
    $id_evento = $_GET['id_evento'];

    $sentencia = $pdo -> prepare("DELETE FROM tb_eventos WHERE id_evento ='$id_evento'");
    if($sentencia->execute()){
        echo "Eliminación exitosa";
        ?>
        <script>location.href = "index.php";</script>
        <?php
    }else{
        echo "No se pudo eliminar";
    }
?>