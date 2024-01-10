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
        $query_rol = $pdo->prepare("SELECT * FROM tb_roles WHERE id_rol = '$id_get' AND  estado = '1' ");
        $query_rol->execute();
        $roles = $query_rol->fetchAll(PDO::FETCH_ASSOC);
        foreach($roles as $rol){
            $id = $rol['id_rol'];
            $nombre = $rol['nombre'];
        }
        ?>
      <h2>Eliminación de rol</h2>
      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="border: 1px solid #AD52FE">
                    <div class="card-header" style="background-color: #D8ADFE">
                        <h4>¿Estás seguro de eliminar el rol?</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value = "<?php echo $nombre;?>" disabled>
                        </div>
                        <div class="form-group">
                            <button class="btn" style="background-color: #D8ADFE" id="btnborrar">Borrar</button>
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
    $('#btnborrar').click(function () {
        var id_rol = <?php echo $id_get = $_GET['id'];?>

            var url="controller_delete.php";
            $.get(url,{id_rol:id_rol},function(datos){
                $('#respuesta').html(datos);
            });

    });

    
</script>