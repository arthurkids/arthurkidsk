<?php
    include('../app/config.php');
    $n_salon = $_POST['n_salon'];
    $nombre= $_POST['nombre'];
    $observaciones = $_POST['observaciones'];


    date_default_timezone_set("America/Mexico_City");
    $fechahora = date("Y-m-d h:i:s");
    $sentencia = $pdo -> prepare ("INSERT INTO tb_mapeos
            (nombre_espacio, num_espacio, observacion,estado) 
     VALUES (:nombre, :n_salon, :observaciones, :estado) ");
    $sentencia->bindParam('nombre',$nombre);
    $sentencia->bindParam('n_salon',$n_salon);
    $sentencia->bindParam('observaciones',$observaciones);
    $sentencia->bindParam('estado',$estado_registro);

    if($sentencia->execute()){
        echo "Registro exitoso";
        ?>
        <script>location.href = "../salones/mapeo.php";</script>
        <?php
    }else{
        echo "No se pudo registar";
    }
?>