<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
        <link rel="stylesheet" href="css/crstyle.css?v=5">

</head>
<body>
    <div class="content">
        <div class="form">
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
    <form action="regist.php" method="post">
         <div class="formcont "><h3>انشاء حساب جديد</h3>
    <p>انضم الي الف من الطلاب حول العالم</p>
    </div>
    <div class="mb-3 ">
        <i class="fa fa-user"></i>

    <label for="exampleInputEmail1" class="form-label text-light" >اسم المستخدم</label>
    
    <input type="text" class="form-control int" name="username" placeholder="عمار البهنساوي" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 ">
    <i class="fa-solid fa-envelope text-light "></i>
    <label for="exampleInputEmail1" class="form-label text-light" >البريد الالكتروني</label>
    
    <input type="email" class="form-control int" name="email" placeholder="Your@email.com" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <i class="fa fa-lock"></i>
    <label for="exampleInputPassword1" class="form-label text-light">كلمة المرور</label>
    <input type="password" class="form-control int" name="password" placeholder=".............." id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <i class="fa fa-lock"></i>
    <label for="exampleInputPassword1" class="form-label text-light">تأكيد كلمة المرور </label>
    <input type="password" class="form-control int" name="confirm_password" placeholder=".............." id="exampleInputPassword1">
  </div>
  <div class="btn">
  
  <button type="submit" class="btn btn-primary"> انشاء حساب</button>
</div>
<div class="logcreat">
   <p>هل لديك حساب؟</p> 
   <a href="login.php ">تسجيل الدخول</a>
</div>
</form>
</div></div>
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