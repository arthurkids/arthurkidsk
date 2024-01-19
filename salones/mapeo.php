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
      <h2>Mapeo de Salones</h2>

      <br>
      <table border ="1" class="table table-bordered table-sm table-striped">
        <th><center>N°</center></th>
        <th><center>N° SALON</center></th>
        <th><center>NOMBRE SALON</center></th>
        <th><center>Acción</center></th>
        <?php
          $contador = 0;
          $query_mapeo = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
          $query_mapeo->execute();
          $mapeos = $query_mapeo->fetchAll(PDO::FETCH_ASSOC);
          foreach($mapeos as $mapeo){
              $id_map = $mapeo['id_map'];
              $num_espacio = $mapeo['num_espacio'];
              $nombre_espacio = $mapeo['nombre_espacio'];
              $contador = $contador + 1;
          ?>
            <tr>
              <td><center><?php echo $id_map?></center></td>
              <td><center><?php echo $num_espacio?></center></td>
              <td><center><?php echo $nombre_espacio?></center></td>
              <td>
                <center>
                  <a href="delete.php?id=<?php echo $id_map;?>" class="btn" style="background-color: #D8ADFE">Borrar</a>
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