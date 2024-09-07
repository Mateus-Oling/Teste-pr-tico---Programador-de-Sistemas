
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/styles.css" /> 
</head>

<div class="user-type">
<?php
include("configuracao.php");
include("sessao.php");

if ($_SESSION['role'] == 'admin') {
    echo "<p>Nível de permissão: Administrador</p>";
} else if ($_SESSION['role'] == 'user') {
    echo "<p>Nível de permissão: Padrão</p>";
}
?>
</div>

<body>
<div class="side-nav">
  <a class="active" href="home.php">Página inicial</a>
  <a href="usuarios.php">Usuários</a>
  <a href="registro.php">Registro</a>
  <a href="logout.php">Sair</a>
</div>

<div>
<img src="./assets/sicredi-logo-3.png" class="sicredi">
</div>
</body>
</html> 