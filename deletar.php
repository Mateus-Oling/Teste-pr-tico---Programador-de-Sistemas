<?php
include("configuracao.php");
include("sessao.php");

if ($_SESSION['role'] === 'user') {
    $userId = $_SESSION['user_id']; 
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = '$userId'");
} else {
    $result = mysqli_query($mysqli, "SELECT * FROM users");
}

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE username='$id'";
if ($mysqli->query($sql) === TRUE) {
    echo "<script>alert('Deletado com sucesso'); window.location='usuarios.php';</script>";
} else {
    echo "Erro: " . $mysqli->error;
}
?>
