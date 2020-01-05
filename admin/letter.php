<?php
   session_start();
   $pageTitle = 'Admin | Admission Letter';
   include 'inc/header.php';
   require_once '../config/config.php';
   require_once '../libraries/Database.php';
if (!isset($_SESSION['user_id'])) {
    header('Location:login.php');
}
if (isset($_POST['back'])) {
    echo '<script>
      
             const url = "http://localhost/AdmissionProcessing/admin/applications.php";
             window.location.assign(url);
            </script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <a href="mailto:<?= $$_GET['email'] ?>">Send Letter</a><br>
    <form action="" method="post">
         <button type="submit" name="back">Back to Application Page</button>
    </form>
   
</body>
</html>
