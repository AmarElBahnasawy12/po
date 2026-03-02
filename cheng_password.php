
<?php
session_start();
include "conect.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


    <title>Document</title>
        <link rel="stylesheet" href="css/updatpass.css">
</head>
<body >



    <?php
    if (isset($_SESSION['message'])):
    ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
            <?php echo $_SESSION['message']; ?>
        </div>
    <?php
        unset($_SESSION['message']);
        unset($_SESSION['msg_type']);
    endif;
    ?>
    <div class="form">
    <form action="update.php" method="post" class="w-7">
    <h3 class="mb-3 text-center">تغيير كلمة المرور</h3>
    <div>
        <label>كلمة السر الحالية:</label>
        <input type="password" name="current_password" required>
    </div>

    <div>
        <label>كلمة السر الجديدة:</label>
        <input type="password" name="new_password" required>
    </div>

    <div>
        <label>تأكيد كلمة السر الجديدة:</label>
        <input type="password" name="confirm_password" required>
    </div>
    <div class="btn">
  
  <button type="submit" class="btn btn-primary">تاكيد</button>
  <a href="profil.php" class="btn btn-danger logout-btn align-self-start">
      
الرجوع    </a>
</div>
</form></div>
</body>
</html>


