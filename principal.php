<?php 
include('app/config.php');
include('layout/admin/sesion_usuario.php');
if(isset($_SESSION['usuario_sesion'])){
   // echo "existe sesion";
    ?>
      <!DOCTYPE html>
      <html lang="es">
      <head>
        <?php include('layout/admin/head.php');?>
      </head>
      <body class="hold-transition sidebar-mini">
      <div class="wrapper">
          <?php include('layout/admin/menu.php');?>
          
          <div class="content-wrapper">
            <br>
          <div class="container">
                          <h2>BIENVENIDO A ARTHUR KIDS KINGDOM</h2>
                            <div class="card card-outline">
                              <div class="card-header">
                                  <h3 class="card-title">MAPEO ACTUAL DE SALONES</h3>
                                  <br>
                                      <div class="row">
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="fecha">Fecha:</label>
                                                  <input type="date" class="form-control" id="fecha" >
                                              </div>
                                          </div>
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="hora">Hora:</label>
                                                  <input type="time" class="form-control" id="hora">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <button class="btn" style="background-color: #F79F64" id="btnguardar">Guardar</button>
                                        <a href="<?php echo $URL;?>/usuarios/" class="btn btn-default" >Cancelar</a>
                                      </div>
                                      <div id="respuesta">

                                      </div>


                              </div>

                              <div class="card-body" style="display: block;">
                                
                              </div>
                          </div>

                    <br>
                </div>
                                  </div>
        <?php include('layout/admin/footer.php');?>
      </div>
      <?php include('layout/admin/footer_links.php');?>
      </body>
      </html>
    <?php


}else{
   echo "no existe";

}
?>

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
        var fecha = $('#fecha').val();
        var hora = $('#hora').val();


        if(fecha == ""){
            alert('Debe llenar este campo');
            $('#fecha').focus();
        }else if(hora == ""){
            alert('Debe llenar este campo');
            $('#hora').focus();
        }else{
            var url="eventos.php";
            $.post(url,{fecha:fecha, hora:hora},function(datos){
                $('#respuesta').html(datos);
            });
        }
    }
</script>

