<?php 
include('../app/config.php');
include('../layout/admin/sesion_usuario.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include('../layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('../layout/admin/menu.php');?>
 
  <div class="content-wrapper">
    <br>
  <div class="container">
      <h2>Listado de Eventos</h2>

      <br>
      <table border ="1" class="table table-bordered table-sm table-striped">
        <th><center>N°</center></th>
        <th><center>Nombre</center></th>
        <th><center>Fecha</center></th>
        <th><center>Hora Inicio</center></th>
        <th><center>Hora Termino</center></th>
        <th><center>Personas</center></th>
        <th><center>Acción</center></th>
        <?php
          $contador = 0;
          $query_evento = $pdo->prepare("SELECT * FROM tb_eventos WHERE estado = '1' ");
          $query_evento->execute();
          $eventos = $query_evento->fetchAll(PDO::FETCH_ASSOC);
          foreach($eventos as $evento){
              $id = $evento['id_evento'];
              $nombre = $evento['nombre_evento'];
              $fecha = $evento['f_evento'];
              $horaini = $evento['h_ini_evento'];
              $horafin = $evento['h_fin_evento'];
              $personas = $evento['personas'];
              $contador = $contador + 1;
          ?>
            <tr>
              <td><center><?php echo $contador?></center></td>
              <td><center><?php echo $nombre?></center></td>
              <td><center><?php echo $fecha?></center></td>
              <td><center><?php echo $horaini?></center></td>
              <td><center><?php echo $horafin?></center></td>
              <td><center><?php echo $personas?></center></td>
              <td>
                <center>
                  <a href="delete.php?id=<?php echo $id;?>" class="btn" style="background-color: #D8ADFE">Borrar</a>
                </center>
              </td>
            </tr>
          <?php
          }
        ?>
      </table>
  </div>
  </div>
  
  <?php include('../layout/admin/footer.php');?>
</div>
<?php include('../layout/admin/footer_links.php');?>
</body>
</html>