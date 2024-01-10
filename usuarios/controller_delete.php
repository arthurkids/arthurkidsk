<?php
include('../app/config.php');
    $id_user = $_GET['id_user'];

    $sentencia = $pdo -> prepare("DELETE FROM tb_usuarios WHERE id ='$id_user'");
    if($sentencia->execute()){
        echo "Eliminación exitosa";
        ?>
        <script>location.href = "index.php";</script>
        <?php
    }else{
        echo "No se pudo eliminar";
    }
?>