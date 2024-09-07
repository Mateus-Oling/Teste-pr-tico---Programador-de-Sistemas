<?php
include("configuracao.php");
include("sessao.php");

if (!isset($_SESSION['user_id'])) {
    echo "ID de usuário não encontrado. Por favor, faça o login novamente.";
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    $userId = $_SESSION['user_id'];

    $query = "SELECT * FROM users WHERE username = '$userId'";
    $result = filterRecord($query);
} else {
    if (isset($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM users WHERE firstname LIKE '%".$valueToSearch."%' OR lastname LIKE '%".$valueToSearch."%'";
        $result = filterRecord($query);
    } else {
        $query = "SELECT * FROM users";
        $result = filterRecord($query);
    }
}

function filterRecord($query) {
    global $mysqli; 
    $filter_result = mysqli_query($mysqli, $query);
    return $filter_result;
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
<h2>Usuários</h2>

<table border='1'>
<tr>
<th>Primeiro Nome</th>
<th>Último nome</th>
<th>Atualizar</th>
<th>Deletar</th>
</tr>

<?php
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";

    if ($_SESSION['role'] === 'admin') {
        echo "<td><a href='edicaoUsuarioAdmin.php?id=".$row['username']."'><img src='./assets/icons8-Edit-32.png' alt='Edit'></a></td>";
        echo "<td><a href='deletar.php?id=".$row['username']."'><img src='./assets/icons8-Trash-32.png' alt='Delete'></a></td>";
    } else {
        if ($row['username'] === $_SESSION['user_id']) {
            echo "<td><a href='edicaoUsuarioAdmin.php?id=".$row['username']."'><img src='./assets/icons8-Edit-32.png' alt='Edit'></a></td>";
            echo "<td>--</td>"; 
        } else {
            echo "<td>--</td>"; 
            echo "<td>--</td>"; 
        }
    }
    echo "</tr>";
}
?>
</table>
</body>
</html>
