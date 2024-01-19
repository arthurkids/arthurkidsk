<?php
include('../app/config.php');
    $id_cliente = $_GET['id_cliente'];

    $sentencia = $pdo -> prepare("DELETE FROM tb_clientes WHERE id_cliente ='$id_cliente'");
    if($sentencia->execute()){
        echo "Eliminación exitosa";
        ?>
        <script>location.href = "index.php";</script>
        <?php
    }else{
        echo "No se pudo eliminar";
    }
?>