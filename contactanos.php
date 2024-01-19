
<?php include('app/config.php');?>
<!DOCTYPE html>
<html lang="en">
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

    <div style="text-align: center; color: #494948;">

       

        <h2>Contacto</h2>
        <p>Estamos aquí para ayudarte a planificar tu próximo evento. ¡Contáctanos para más información!</p>

        <!-- Información de contacto -->
        <div style="margin-top: 20px;">
            <h3>Dirección</h3>
            <p>Visítanos en cualquiera de nuestras sucursales:</p>
                <li><strong>Lindavista:</strong> Dirección Lindavista, Ciudad de México</li>
                <li><strong>Polanco:</strong> Dirección Polanco, Ciudad de México</li>
                <li><strong>Perisur:</strong> Dirección Perisur, Ciudad de México</li>

            <img src="public/imagenes/SKY-ROLLER-2.jpg" alt="" style="float: left;"  width="150" height="170">
            <img src="public/imagenes/2021-09-21.jpg" alt="" style="float: right;"  width="150" height="170">

            <h3>Teléfono</h3>
            <p>¡Llámanos para reservar tu evento!</p>
            <p><strong>Teléfono:</strong> (123) 456-7890</p>

            <h3>Correo Electrónico</h3>
            <p>Envíanos un correo electrónico para consultas:</p>
            <p><strong>Email:</strong> arthurkidsk@gmail.com</p>
            
        </div>

        <!-- Redes Sociales -->
        <div style="margin-top: 20px;">
            <h3>Síguenos en Redes Sociales</h3>
            <p>Nos encuentras como <strong>ArthurKidsK</strong> en todas nuestras plataformas:</p>
            
        </div>
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