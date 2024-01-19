<?php
    include('app/config.php');
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $query_principal = $pdo->prepare("SELECT * FROM tb_eventos WHERE estado = '1' AND f_evento = '$fecha' AND h_ini_evento = '$hora'");
    $query_principal->execute();
    $principales = $query_principal->fetchAll(PDO::FETCH_ASSOC);
    foreach($principales as $principal){
        $id = $principal['id_evento'];
        $nombre = $principal['nombre_evento'];
        $fecha = $principal['f_evento'];
        $horaini = $principal['h_ini_evento'];
        $horafin = $principal['h_fin_evento'];
        $personas = $principal['personas'];
        $salon = $principal['salon'];

        if($salon == ""){?>
          <div class = "col">
          <center>
            <h2><?php echo $id?><h2>
            <p><?php echo $nombre?></p>
            <a href="eventos/asignar.php"class="btn" style="background-color: #D1F2EB" >
            <img src="<?php echo $URL;?>/public/imagenes/Picture2.png" width="200px" alt="">
              <p><?php echo $salon?></p>
            </a>
        </center>
          </div
          
          <?php
        }
        else{?>
            <div class = "col">
            <center>
              <h2><?php echo $id?><h2>
              <p><?php echo $nombre?></p>
              <a href="clientes/asignar.php"class="btn" style="background-color: #FADBD8">
                <img src="<?php echo $URL;?>/public/imagenes/Picture1Logo.png" width="200px" alt="">
                <p><?php echo $salon?></p>
              </a>
            </center>
            </div>
            <?php
          }
          ?>
          
          <?php
    }

?>