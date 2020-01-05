<?php
    require_once '../config/config.php';
    require_once '../helpers/format_helper.php';
    require_once '../libraries/Database.php';
    $db = new Database;
try {
    $sql = 'SELECT * FROM adminp ORDER BY id DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $profile = $stmt->fetch();
} catch (PDOEXception $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}
            
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $pageTitle; ?> </title>

    <!-- Bootstrap -->
    <link href="inc/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="inc/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="inc/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="inc/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="inc/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="inc/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
   
    <!-- Custom styling plus plugins -->
    <link href="inc/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><img src="inc/images/atu.png" alt="User" class="profile_img" style="width: 150px;"> </a>
            </div>

            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/profile/<?php echo $profile->picProfile ?>" alt="User" class="img-circle profile_img" style="height: 70px; width: 70px;">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $profile->name?></h2>
                </div>
                </div>
                <!-- /menu profile quick info -->