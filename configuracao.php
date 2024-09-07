<?php
$mysqli = new mysqli("localhost", "root", "123", "registration");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>