<?php
include_once 'db_connect.php';
date_default_timezone_set('America/Fortaleza');
?>

<?php
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
$result = mysqli_query($connect, $sql);
$dado = mysqli_fetch_assoc($result);
if ($dado['login'] == $login && $dado['senha'] == $senha) {
  setcookie("login",$login);
  header("Location:pseudoindex.php");
} else {
  echo"<script language='javascript' type='text/javascript'>
  alert('Login e/ou senha incorretos');window.location
  .href='login.html';</script>";
}

?>