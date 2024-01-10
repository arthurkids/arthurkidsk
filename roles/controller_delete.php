<?php
include('../app/config.php');
    $id_rol = $_GET['id_rol'];

    $sentencia = $pdo -> prepare("DELETE FROM tb_roles WHERE id_rol ='$id_rol'");
    if($sentencia->execute()){
        echo "Eliminación exitosa";
        ?>
        <script>location.href = "index.php";</script>
        <?php
    }else{
        echo "No se pudo eliminar";
    }
?>