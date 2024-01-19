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
      <h2>Asignacion de Salon a Eventos</h2>
            <div class="card card-outline">
                <div class="card-header">
                <h3 class="card-title">Listado de Eventos</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" fdprocessedid="gp4crf">
                <i class="fas fa-minus"></i>
                </button>
                </div>

                </div>

                <div class="card-body">
                <table border ="1" class="table table-bordered table-sm table-striped">
                <th><center>N°</center></th>
                <th><center>Nombre</center></th>
                <th><center>Fecha</center></th>
                <th><center>Hora Inicio</center></th>
                <th><center>Hora Termino</center></th>
                <th><center>Personas</center></th>
                <th><center>Salon</center></th>
                    <?php
                    $contador = 0;
                    $query_evento = $pdo->prepare("SELECT * FROM tb_eventos WHERE estado = '1' ");
                    $query_evento->execute();
                    $eventos = $query_evento->fetchAll(PDO::FETCH_ASSOC);
                    foreach($eventos as $evento){
                        $id = $evento['id_evento'];
                        $nombre = $evento['nombre_evento'];
                        $fecha = $evento['f_evento'];
                        $horaini = $evento['h_ini_evento'];
                        $horafin = $evento['h_fin_evento'];
                        $personas = $evento['personas'];
                        $salon = $evento['salon'];
                        $contador = $contador + 1;
                    ?>
                        <tr>
                        <td><center><?php echo $contador?></center></td>
                        <td><center><?php echo $nombre?></center></td>
                        <td><center><?php echo $fecha?></center></td>
                        <td><center><?php echo $horaini?></center></td>
                        <td><center><?php echo $horafin?></center></td>
                        <td><center><?php echo $personas?></center></td>
                        <td>
                            <center>
                                <?php
                                if($salon == ""){ ?>
                                    <button type="button" class="btn" style="background-color: #B0E6FC" data-toggle="modal" data-target="#exampleModal<?php echo $id?>">
                                    Asignar
                                    </button>
        
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Asignar Salon</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="controller_asignar.php" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Nombre del Evento</label>
                                                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Fecha</label>
                                                            <input type="text" name="fecha" class="form-control" value="<?php echo $fecha?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Hora de inicio</label>
                                                            <input type="text" name="horaini" class="form-control" value="<?php echo $horaini?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Hora Fin</label>
                                                            <input type="text" name="horafin" class="form-control" value="<?php echo $horafin?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Personas</label>
                                                            <input type="text" name="fecha" class="form-control" value="<?php echo $personas?>">
                                                            <input type="text" name="id_evento" value="<?php echo $id;?>" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Salones</label>
                                                            <select name="salon" id="" class="form-control">
                                                                    <?php
                                                                     $query_mapeo = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
                                                                     $query_mapeo->execute();
                                                                     $mapeos = $query_mapeo->fetchAll(PDO::FETCH_ASSOC);
                                                                     foreach($mapeos as $mapeo){
                                                                         $id_map = $mapeo['id_map'];
                                                                         $nombre_espacioj = $mapeo['nombre_espacio'];
                                                                    ?>
                                                                <option values="<?php echo $nombre_espacioj?>"><?php echo $nombre_espacioj?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Asignar Rol</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <?php
                                }else{
                                    echo $salon;
                                }
                            
                                ?>
                           
                            </center>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                </div>
            </div>

      <br>
  </div>
  </div>
  
  <?php include('../layout/admin/footer.php');?>
</div>
<?php include('../layout/admin/footer_links.php');?>
</body>
</html>