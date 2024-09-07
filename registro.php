<?php
include("configuracao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user'; 

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Usuário já existe. Tente novamente!'); window.location='registro.php';</script>";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO users (firstname, lastname, username, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstname, $lastname, $username, $password, $role);

        if ($stmt->execute()) {
            echo "<script>alert('Usuário registrado com sucesso!'); window.location='loginUsuario.html';</script>";
        } else {
            echo "<script>alert('Erro no registro!'); window.location='registro.php';</script>";
        }
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
<div class="side-nav">
  <a class="active" href="home.php">Página inicial</a>
  <a href="usuarios.php">Usuários</a>
  <a href="registro.php">Registro</a>
  <a href="logout.php">Sair</a>
</div>
<form action="registro.php" method="POST">
    <div class="container">
        <label><b>Primeiro nome</b></label>
        <input type="text" placeholder="Primeiro nome" name="firstname" required>

        <label><b>Último nome</b></label>
        <input type="text" placeholder="Último nome" name="lastname" required>

        <label><b>Usuário</b></label>
        <input type="text" placeholder="Nome de usuário" name="username" required>

        <label><b>Senha</b></label>
        <input type="password" placeholder="Senha" name="password" required>

        <button type="submit">Registrar</button>
    </div>
</form>
</body>
</html>
