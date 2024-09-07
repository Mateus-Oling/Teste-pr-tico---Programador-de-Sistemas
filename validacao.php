<?php
include("configuracao.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);

    $query = "SELECT username, password, role FROM users WHERE username = '$username' AND password = '$password'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $username;
        $_SESSION['role'] = $row['role'];
        $_SESSION['user_id'] = $username; 
        header('Location: home.php');
    } else {
        echo "<script>alert('Credenciais inválidas'); window.location='loginUsuario.html';</script>";
    }
}
?>
