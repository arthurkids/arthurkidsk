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
      <h2>Creación de Nuevo Rol</h2>
      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="border: 1px solid #CAFB9E">
                    <div class="card-header" style="background-color: #CAFB9E">
                        <h4>Nuevo Rol</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <button class="btn" style="background-color: #CAFB9E" id="btnguardar">Guardar</button>
                            <a href="<?php echo $URL;?>/roles/" class="btn btn-default" >Cancelar</a>
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

    $('#nombre').keypress(function(e){
      if(e.which == 13){
        entrar();
      }
    });

    function entrar(){
        var nombre = $('#nombre').val();

        if(nombre == ""){
            alert('Debe llenar este campo');
            $('#nombres').focus();
        }else{
            var url="controller_create.php";
            $.post(url,{nombre:nombre},function(datos){
                $('#respuesta').html(datos);
            });
        }
    }
</script>