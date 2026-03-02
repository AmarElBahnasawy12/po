<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "final logininformation";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>