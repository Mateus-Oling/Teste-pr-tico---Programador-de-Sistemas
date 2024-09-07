<?php
include("configuracao.php");
include("sessao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo "ID de usuário não encontrado. Faça o login novamente.";
        exit();
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $new_username = $_POST['new_username'];
    $password = $_POST['password'];

    if ($_SESSION['role'] === 'user') {
        $current_username = $_SESSION['user_id'];
        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$new_username', password='$password' WHERE username='$current_username'";
    } else {
        $user_to_update = $_POST['username'];
        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$new_username', password='$password' WHERE username='$user_to_update'";
    }

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Atualização feita com sucesso'); window.location='usuarios.php';</script>";
    } else {
        echo "Erro: " . $mysqli->error;
    }
}
?>
