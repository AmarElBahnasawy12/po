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


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
include("conect.php");
$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];
$password_confirm=$_POST[""];
$stm="INSERT INTO users (username, email, password, courses, certificates, hours, completed_courses) VALUES (?, ?, ?, 0, 0, 0, 0)";
$x=mysqli_query( $conn, $stm ) or die(mysqli_error($conn));
if($x){
    echo "تم اضافة المستخدم";
}
else{
    echo "لم يتم الاضافة";
}

}





?>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>