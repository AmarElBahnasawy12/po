<?php
session_start();
require "conect.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user_id = $_SESSION['id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $_SESSION['message'] = "املأ جميع الحقول";
        $_SESSION['msg_type'] = "danger";
        header("Location: cheng_password.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if (!$user || !password_verify($current_password, $user['password'])) {
        $_SESSION['message'] = "كلمة السر الحالية غير صحيحة";
        $_SESSION['msg_type'] = "danger";
        header("Location: cheng_password.php");
        exit;
    }

    if ($new_password !== $confirm_password) {
        $_SESSION['message'] = "كلمتا السر غير متطابقتين";
        $_SESSION['msg_type'] = "warning";
        header("Location: cheng_password.php");
        exit;
    }

    $hashed = password_hash($new_password, PASSWORD_DEFAULT);

    $update = $conn->prepare("UPDATE users SET password=? WHERE id=?");
    $update->bind_param("si", $hashed, $user_id);
    $update->execute();

    $_SESSION['message'] = "تم تغيير كلمة السر بنجاح ✅";
    $_SESSION['msg_type'] = "success";
    header("Location: cheng_password.php");
    exit;
}
?>