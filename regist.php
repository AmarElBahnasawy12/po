<?php
include "conect.php";




if ($_SERVER["REQUEST_METHOD"] === "POST") {

    include("conect.php");

    $username = trim($_POST["username"] ?? '');
    $email    = trim($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';
    $confirm  = $_POST["confirm_password"] ?? '';

    /* ========= التحقق من البيانات ========= */
    if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
        echo("من فضلك املأ جميع الحقول");
        exit;
    }

   if (
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    !preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $email)
) {
    echo("ياصحبي متحورش دخل الاميل صح @gmail.com");
    exit;
}

    if ($password !== $confirm) {
        echo("كلمتا المرور غير متطابقتين");
        exit;
    }

    if (strlen($password) < 8) {
        echo("كلمة المرور يجب ألا تقل عن 8 أحرف");
        exit;
    }

    /* ========= تشفير كلمة المرور ========= */
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    /* ========= التحقق من الإيميل ========= */
    $check = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        echo("الإيميل مستخدم بالفعل");
        exit;
    }

    /* ========= إدخال المستخدم ========= */
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users 
        (username, email, password, courses, certificates, hours, completed_courses)
        VALUES (?, ?, ?, 0, 0, 0, 0)"
    );
mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['message'] = "تم إنشاء الحساب بنجاح 🎉";
    $_SESSION['msg_type'] = "success";
} else {
    $_SESSION['message'] = "حدث خطأ أثناء إنشاء الحساب ❌";
    $_SESSION['msg_type'] = "danger";
}

header("Location: creat_acount.php");
exit;

    /* ========= إغلاق ========= */
    mysqli_stmt_close($check);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


// جلب كلمة السر الحالية من قاعدة البيانات
$stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!password_verify($current_password, $user['password'])) {
    $_SESSION['message'] = "كلمة السر الحالية غير صحيحة";
    $_SESSION['msg_type'] = "danger";
    header("Location: change_password.php");
    exit();
}

if ($new_password !== $confirm_password) {
    $_SESSION['message'] = "كلمة السر الجديدة وتأكيدها غير متطابقين";
    $_SESSION['msg_type'] = "warning";
    header("Location: change_password.php");
    exit();
}

// تشفير كلمة السر الجديدة
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// تحديث كلمة السر في قاعدة البيانات
$update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
$update->bind_param("si", $hashed_password, $user_id);

if ($update->execute()) {
    $_SESSION['message'] = "تم تغيير كلمة السر بنجاح ✅";
    $_SESSION['msg_type'] = "success";
} else {
    $_SESSION['message'] = "حدث خطأ أثناء تغيير كلمة السر ❌";
    $_SESSION['msg_type'] = "danger";
}

header("Location: dashboard.php");
exit;
?>
?>