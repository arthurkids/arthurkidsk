<?php
    include('../app/config.php');
    $nombre = $_POST['nombre'];
    $fecha= $_POST['fecha'];
    $horaini =$_POST['horaini'];
    $horafin = $_POST['horafin'];
    $personas = $_POST['personas'];

    date_default_timezone_set("America/Mexico_City");
    $fechahora = date("Y-m-d h:i:s");
    $sentencia = $pdo -> prepare ("INSERT INTO tb_eventos
            (nombre_evento, f_evento, h_ini_evento, h_fin_evento, personas,estado) 
     VALUES (:nombre, :fecha, :horaini, :horafin, :personas, :estado) ");
    $sentencia->bindParam('nombre',$nombre);
    $sentencia->bindParam('fecha',$fecha);
    $sentencia->bindParam('horaini',$horaini);
    $sentencia->bindParam('horafin',$horafin);
    $sentencia->bindParam('personas',$personas);
    $sentencia->bindParam('estado',$estado_registro);

    if($sentencia->execute()){
        echo "Registro exitoso";
        ?>
        <script>location.href = "../eventos/index.php";</script>
        <?php
    }else{
        echo "No se pudo registar";
    }
?>