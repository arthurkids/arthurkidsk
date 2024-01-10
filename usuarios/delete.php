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

        <?php
        $id_get = $_GET['id'];
        $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id = '$id_get' AND  estado = '1' ");
        $query_usuario->execute();
        $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
        foreach($usuarios as $usuario){
            $id = $usuario['id'];
            $nombres = $usuario['nombres'];
            $email = $usuario['email'];
            $contraseña = $usuario['contraseña'];
        }
        ?>
      <h2>Eliminación de Usuario</h2>
      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="border: 1px solid #AD52FE">
                    <div class="card-header" style="background-color: #D8ADFE">
                        <h4>¿Estás seguro de eliminar el usuario?</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" id="nombres" value = "<?php echo $nombres;?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="email" value = "<?php echo $email;?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" id="passworduser" value = "<?php echo $contraseña;?>" disabled>
                        </div>
                        <div class="form-group">
                            <button class="btn" style="background-color: #D8ADFE" id="btnborrar">Borrar</button>
                            <a href="<?php echo $URL;?>/usuarios/" class="btn btn-default" >Cancelar</a>
                        </div>
                        <div id="respuesta">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
      </div>
  </div>
  </div>
  
  <?php include('../layout/admin/footer.php');?>
</div>
<?php include('../layout/admin/footer_links.php');?>
</body>
</html>

<script>
    $('#btnborrar').click(function () {
       entrar();

    });

    $('#passworduser').keypress(function(e){
      if(e.which == 13){
        entrar();
      }
    });
    
    function entrar(){
        var id_user = <?php echo $id_get = $_GET['id'];?>

            var url="controller_delete.php";
            $.get(url,{id_user:id_user},function(datos){
                $('#respuesta').html(datos);
            });
    }
</script>