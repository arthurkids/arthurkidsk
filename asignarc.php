<?php 
include('app/config.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>INDEX</title>
</head>
<body style="background-image:url('public/imagenes/fondo.png')">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f8a963;">
<a class="navbar-brand" href="index.php">
    <img src="public/imagenes/Picture1Logo.png" width="30" height="30" alt=""> SALON DE EVENTOS
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">INICIO <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="inicio.php">SOBRE NOSOTROS</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          SALONES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="salones.php">SALONES</a>
          <a class="dropdown-item" href="clientes.php">CLIENTES</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="eventosi.php">EVENTOS</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contactanos.php">CONTACTANOS</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </form>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Ingresar
</button>
  </div>
</nav>

<div class="container" style="display: flex; justify-content: center; align-items: center; height: 90vh;">
 
  <div class="content-wrapper">
    <br>
  <div class="container">
      <h2>Asignacion de Cliente a Eventos</h2>
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
                <th><center>Cliente</center></th>
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
                        $cliente = $evento['cliente'];
                        $contador = $contador + 1;
                    ?>
                        <tr>
                        <td><center><?php echo $contador?></center></td>
                        <td><center><?php echo $nombre?></center></td>
                        <td><center><?php echo $fecha?></center></td>
                        <td><center><?php echo $horaini?></center></td>
                        <td><center><?php echo $horafin?></center></td>
                        <td><center><?php echo $personas?></center></td>
                        <td><center><?php echo $salon?></center></td>

                        <td>
                            <center>
                                <?php
                                if($cliente == ""){ ?>
                                    <button type="button" class="btn" style="background-color: #B0E6FC" data-toggle="modal" data-target="#exampleModal<?php echo $id?>">
                                    Asignar
                                    </button>
        
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Asignar Cliente</h5>
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
                                                            <label for="">Clientes</label>
                                                            <select name="cliente" id="" class="form-control">
                                                                    <?php
                                                                     $query_cliente = $pdo->prepare("SELECT * FROM tb_clientes WHERE estado = '1' ");
                                                                     $query_cliente->execute();
                                                                     $clientes = $query_cliente->fetchAll(PDO::FETCH_ASSOC);
                                                                     foreach($clientes as $cliente){
                                                                         $id = $cliente['id_cliente'];
                                                                         $email = $cliente['email'];
                                                                    ?>
                                                                <option values="<?php echo $email?>"><?php echo $email?></option>
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
                                            <button type="submit" class="btn btn-primary">Asignar Cliente</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <?php
                                }else{
                                    echo $cliente;
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
  
  <script src="Public/js/jquery-3.5.1.min.js"></script>
    <script src="Public/js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="Public/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio de sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Usuario/Email</label>
              <input type="email" id="usuario" class="form-control" required>
              <label for="">Contraseña</label>
              <input type="password" id="contrasena" class="form-control" required>
            </div>
          </div>
        </div>
        <div id="respuesta"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-ingresar">Ingresar</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#btn-ingresar').click(function(){
    login();
  });
  
    $('#contrasena').keypress(function(e){
      if(e.which == 13){
        login();
      }
    });

    function login(){
      var usuario = $('#usuario').val();
    var contrasena = $('#contrasena').val();

      if(usuario == ""){
        alert('Debe introducir su usuario...');
        $('#usuario').focus();
      }else if (contrasena == ""){
        alert('Debe introducir su contraseña...');
        $('#contrasena').focus();
      }else{
          var url="login/controller_login.php"
          $.post(url,{usuario:usuario, contrasena:contrasena},function(datos){
          $('#respuesta').html(datos);
        });
      }
    }
  </script>