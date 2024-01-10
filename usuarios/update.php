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
      <h2>Actualización de Nuevo Usuario</h2>
      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="border: 1px solid #FC61BA">
                    <div class="card-header" style="background-color: #FEADDC">
                        <h4>Edición del Usuario</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" id="nombres" value = "<?php echo $nombres;?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="email" value = "<?php echo $email;?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" id="passworduser" value = "<?php echo $contraseña;?>">
                        </div>
                        <div class="form-group">
                            <button class="btn" style="background-color: #FEADDC" id="btnactualizar">Actualizar</button>
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
    $('#btnactualizar').click(function () {
        entrar();

    });

    $('#contrasena').keypress(function(e){
      if(e.which == 13){
        entrar();
      }
    });

    function entrar(){
        var nombres = $('#nombres').val();
        var email = $('#email').val();
        var passworduser = $('#passworduser').val();
        var id_user = <?php echo $id_get = $_GET['id'];?>

        if(nombres == ""){
            alert('Debe llenar este campo');
            $('#nombres').focus();
        }else if(email == ""){
            alert('Debe llenar este campo');
            $('#email').focus();
        }else if(passworduser == ""){
                alert('Debe llenar este campo');
                $('#passworduser').focus();
        }else{
            var url="controller_update.php";
            $.get(url,{nombres:nombres, email:email, passworduser:passworduser, id_user:id_user},function(datos){
                $('#respuesta').html(datos);
            });
        }
    }
</script>