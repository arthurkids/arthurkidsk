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
      <h2>Creación de Salones</h2>
      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="border: 1px solid #F9B182">
                    <div class="card-header" style="background-color: #F79F64">
                        <h4>Nuevo Salon</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">N° Salon</label>
                            <input type="number" class="form-control" id="n_salon">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea name="" id="observaciones" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn" style="background-color: #F79F64" id="btnguardar">Crear</button>
                            <a href="<?php echo $URL;?>/salones/" class="btn btn-default" >Cancelar</a>
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
        var n_salon = $('#n_salon').val();
        var nombre = $('#nombre').val();
        var observaciones = $('#observaciones').val();

        if(n_salon == ""){
            alert('Debe llenar este campo');
            $('#n_salon').focus();
        }else if(nombre == ""){
            alert('Debe llenar este campo');
            $('#nombre').focus();
        }else if(observaciones == ""){
                alert('Debe llenar este campo');
                $('#observaciones').focus();
        }else{
            var url="controller_create.php";
            $.post(url,{n_salon:n_salon, nombre:nombre, observaciones:observaciones},function(datos){
                $('#respuesta').html(datos);
            });
        }
    }
</script>