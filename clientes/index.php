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
      <h2>Listado de Clientes</h2>

      <br>
      <table border ="1" class="table table-bordered table-sm table-striped">
        <th><center>N°</center></th>
        <th><center>Nombre</center></th>
        <th><center>Apellido</center></th>
        <th><center>Email</center></th>
        <th><center>Telefono</center></th>
        <th><center>Acción</center></th>
        <?php
          $contador = 0;
          $query_cliente = $pdo->prepare("SELECT * FROM tb_clientes WHERE estado = '1' ");
          $query_cliente->execute();
          $clientes = $query_cliente->fetchAll(PDO::FETCH_ASSOC);
          foreach($clientes as $cliente){
              $id = $cliente['id_cliente'];
              $nombre = $cliente['nombre'];
              $apellido = $cliente['apellido'];
              $email = $cliente['email'];
              $telefono = $cliente['telefono'];
              $contador = $contador + 1;
          ?>
            <tr>
              <td><center><?php echo $contador?></center></td>
              <td><center><?php echo $nombre?></center></td>
              <td><center><?php echo $apellido?></center></td>
              <td><center><?php echo $email?></center></td>
              <td><center><?php echo $telefono?></center></td>
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