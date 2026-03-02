<?php
session_start();
include "conect.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["id"];

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


    <title>Document</title>
        <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="all">
  <div class="information d-flex justify-content-between align-items-start">

    <!-- المحتوى على اليسار -->
    <div class="user-info">
      <h2>مرحباً <?php echo $user["username"]; ?></h2>
      <p><i class="fa-regular fa-envelope text-light me-2"></i><?php echo $user["email"]; ?></p>
      <p><i class="fa-regular fa-calendar text-info me-2"></i>
        تاريخ الانضمام: <?php echo date("Y/m/d", strtotime($user["created_at"])); ?>
      </p>
    </div>

    <!-- زر تسجيل الخروج على اليمين -->
     <a href="cheng_password.php" class="btn btn-danger logout-btn align-self-start">
      
      تغيير كلمة السر
    </a>

    <a href="login.php" class="btn btn-danger logout-btn align-self-start">
      <i class="fa-solid fa-arrow-right-from-bracket ms-1"></i>
      تسجيل الخروج
    </a>
    
  </div>
  <p class="mt-5">
    <i class="fa-solid fa-book text-info me-2"></i>
    عدد الكورسات المسجلة: <?php echo $user["cours"]; ?>
</p>
<p>
    <i class="fa-solid fa-clock text-info me-2"></i>
    عدد الساعات المجتازة: <?php echo $total_hours; ?> ساعة
</p>

</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
