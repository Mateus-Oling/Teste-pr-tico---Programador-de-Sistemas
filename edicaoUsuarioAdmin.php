<?php
include("configuracao.php");
include("sessao.php");

if (!isset($_SESSION['user_id'])) {
    echo "ID de usuário não encontrado. Faça o login novamente.";
    exit();
}

if (isset($_GET['id'])) {
    $username = $_GET['id'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        die("Pesquisa falhou: " . mysqli_error($mysqli));
    }

    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "Usuário não encontrado.";
        exit();
    }
} else {
    echo "Nenhum ID de usuário especificado.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/styles.css" /> 
</head>
<body>
<div class="side-nav">
  <a class="active" href="home.php">Página inicial</a>
  <a href="usuarios.php">Usuários</a>
  <a href="registro.php">Registrar</a>
  <a href="logout.php">Logout</a>
</div>
<h2>Editar Usuário</h2>

<form method="post" action="atualizar.php" class="form-user-edit">
    <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
    
    <label for="firstname">Primeiro Nome:</label>
    <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>
    
    <label for="lastname">Último Nome:</label>
    <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>
    
    <label for="new_username">Novo Nome de Usuário:</label>
    <input type="text" id="new_username" name="new_username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
    
    <label for="password">Nova Senha:</label>
    <input type="password" id="password" name="password" placeholder="Digite uma nova senha" required>
    
    <button type="submit">Atualizar</button>
</form>
</body>
</html>
