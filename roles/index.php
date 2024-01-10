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
      <h2>Listado de Roles</h2>

      <br>
      <table border ="1" class="table table-bordered table-sm table-striped">
        <th><center>N°</center></th>
        <th><center>Nombre del Rol</center></th>
        <th><center>Acción</center></th>
        <?php
          $contador = 0;
          $query_rol = $pdo->prepare("SELECT * FROM tb_roles WHERE estado = '1' ");
          $query_rol->execute();
          $roles = $query_rol->fetchAll(PDO::FETCH_ASSOC);
          foreach($roles as $rol){
              $id = $rol['id_rol'];
              $nombre = $rol['nombre'];
              $contador = $contador + 1;
          ?>
            <tr>
              <td><center><?php echo $contador?></center></td>
              <td><center><?php echo $nombre?></center></td>
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