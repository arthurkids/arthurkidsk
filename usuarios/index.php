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
      <h2>Listado de Usuarios</h2>

      <br>
      <table border ="1" class="table table-bordered table-sm table-striped">
        <th><center>N°</center></th>
        <th><center>Nombre de Usuarios</center></th>
        <th><center>Email</center></th>
        <th><center>Acción</center></th>
        <?php
          $contador = 0;
          $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE estado = '1' ");
          $query_usuario->execute();
          $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
          foreach($usuarios as $usuario){
              $id = $usuario['id'];
              $nombres = $usuario['nombres'];
              $email = $usuario['email'];
              $contador = $contador + 1;
          ?>
            <tr>
              <td><center><?php echo $contador?></center></td>
              <td><center><?php echo $nombres?></center></td>
              <td><center><?php echo $email?></center></td>
              <td>
                <center>
                  <a href="update.php?id=<?php echo $id;?>" class="btn" style="background-color: #FEADDC">Editar</a>
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