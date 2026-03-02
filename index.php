<?php
session_start();
include "conect.php"; // تأكد إن المسار صح و الملف موجود

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = ($_POST["email"]);
    $password = ($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare ($conn,$sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

     if (mysqli_num_rows($result) === 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user["password"])) {
            $_SESSION["id"] = $user["id"];
            header("Location: profil.php");
            exit();
        } else {
            echo "كلمة المرور غلط";
        }
    } else {
        echo "الإيميل مش موجود";
    }

} // نهاية شرط POST
?>


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="hidden md:flex items-center gap-6">
   <a class="flex items-center gap-2 font-bold text-xl text-accent" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open" aria-hidden="true"><path d="M12 7v14"></path><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path></svg><span>أكاديميتي</span></a> 

    <a class="text-sm text-muted-foreground hover:text-foreground transition" href="#">الرئيسية</a>
 <!-- <a class="login" class="px-4 py-2 rounded-lg bg-accent text-accent-foreground hover:bg-accent/90 transition text-sm font-medium" href="#">تسجيل الدخول</a></div> -->

</nav>
    <div class="form">
       
    <form method="POST" action="login.php">
         <div class="formcont "><h3>تسجيل الدخول </h3>
    <p>استقبل دورات عالية الجودة من موقع أكاديمية</p>
    </div>
  <div class="mb-3 ">
    <i class="fa-solid fa-envelope text-light "></i>
    <label for="exampleInputEmail1" class="form-label text-light" >البريد الالكتروني</label>
    <!-- <i class="fa-solid fa-envelope text-light "></i> -->
    <input type="email" class="form-control int" name="email" placeholder="Your@email.com" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <i class="fa fa-lock"></i>
    <label for="exampleInputPassword1" class="form-label text-light">كلمة المرور</label>
    <input type="password" class="form-control int" name="password"  placeholder=".............." id="exampleInputPassword1">
  </div>
  <div class="btn">
  
  <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
</div>
<div class="logcreat">
   <p>ليس لديك حساب</p> 
   <a href="creat_acount.php ">انشاء حساب</a>
</div>
</form>
</div>

<footer>
    <div class="container">
    <div class="row">
        <div class="fr col-lg-3 col-md-3 col-sm-6 ">
    <h4>أكاديميتي </h4>
    <p>منصة تعليمية متخصصة في تقديم دورات عالية تؤهل لسوق العمل </p></div>
    <div class="lin col-lg-3 col-md-3 col-sm-6">
    <h5>الروابط السريعة  </h5>
    <ul>
        <li><a href="">الرئسية</a> </li>
        <li><a href="">الدورات</a></li>
        <li><a href="">من نحن</a></li>
        <li><a href="">اتصل بنا</a></li>
    </ul></div>
    <div class="lin col-lg-3 col-md-3 col-sm-6 ">
    <h5>تواصل معنا  </h5>
    <ul>
        <li><i class="fa-regular fa-envelope"></i>amrramad2252@gmail.com</a> </li>
        <li><i class="fa-solid fa-phone"></i>01026306361</li>
         <li><i class="fa-solid fa-location-dot"></i>الزقازيق ,الشرقية</li>
        
    </ul>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 d-flex justify-content-between">
    <div class="fac">
    <a href="https://www.facebook.com/share/18sD76rhG3/"><i class="fa-brands fa-facebook-square"></i></a></div>
    <div class="fac">
    <a href="https://x.com/amarRam30370005"><i class="fa-brands fa-twitter-square"></i></a></div>
    <div class="fac">
    <a href="https://www.instagram.com/amar_miro99?utm_source=qr&igsh=YTA4cDJhcDRkN2Fs"><i class="fa-brands fa-instagram-square"></i></a></div>
    <div class="fac">
 <a href="Phttps://www.linkedin.com/in/amar-el-bahnasawy-2a3360330?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">
  <i class="fa-brands fa-linkedin-in"></i>
</a></div>
</div>
    </div>
    
<div class="copyright">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <p>
          <i class="fa-regular fa-copyright"></i>
          جميع الحقوق محفوظة لدى أكاديميتي 2026
        </p>
      </div>
    </div>
  </div>
</div>
</footer>











<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>