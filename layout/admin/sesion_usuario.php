<?php
session_start();
$usuario_sesion = $_SESSION['usuario_sesion'];

$query_usuario_s = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_sesion'AND estado = '1' ");
$query_usuario_s ->execute();
$usuarioss = $query_usuario_s->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarioss as $usuarios){
    $ids = $usuarios['id'];
    $nombress = $usuarios['nombres'];
    $emails = $usuarios['email'];
    $rols = $usuarios['rol'];
}
$nombre_usuario_sesion = "ariana";
?>