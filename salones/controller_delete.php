<?php
include('../app/config.php');
    $id_map = $_GET['id_map'];

    $sentencia = $pdo -> prepare("DELETE FROM tb_mapeos WHERE id_map ='$id_map'");
    if($sentencia->execute()){
        echo "Eliminación exitosa";
        ?>
        <script>location.href = "mapeo.php";</script>
        <?php
    }else{
        echo "No se pudo eliminar";
    }
?>