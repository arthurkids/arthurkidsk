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
      <h2>Creación de Nuevo Usuario</h2>
      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="border: 1px solid #F9B182">
                    <div class="card-header" style="background-color: #F79F64">
                        <h4>Nuevo Usuario</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" id="nombres">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="passworduser">
                        </div>
                        <div class="form-group">
                            <button class="btn" style="background-color: #F79F64" id="btnguardar">Guardar</button>
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
    $('#btnguardar').click(function () {
       entrar();

    });

    $('#passworduser').keypress(function(e){
      if(e.which == 13){
        entrar();
      }
    });

    function entrar(){
        var nombres = $('#nombres').val();
        var email = $('#email').val();
        var passworduser = $('#passworduser').val();

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
            var url="controller_create.php";
            $.post(url,{nombres:nombres, email:email, passworduser:passworduser},function(datos){
                $('#respuesta').html(datos);
            });
        }
    }
</script>