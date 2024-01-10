<?php 
include('../app/config.php');

session_start();
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$email_tabla = ''; $contrasena_tabla = '';
$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email= '$usuario' and contraseña = '$contrasena' and estado = '1' ");
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario_dos){
    $email_tabla = $usuario_dos['email'];
    $contrasena_tabla = $usuario_dos['contraseña'];
}

if(($usuario==$email_tabla) && ($contrasena == $contrasena_tabla)){
    ?>
        <div class="alert alert-success" role="alert">
            Usuario Correcto
        </div>
        <script>location.href = "principal.php";</script>
    <?php   
    $_SESSION['usuario_sesion'] = $email_tabla;
}else{
    ?>
        <div class="alert alert-danger" role="alert">
            Error al introducir sus datos
        </div>
        <script>$('#contrasena').val("");$('#contrasena').focus();</script>
    <?php  
}

?>