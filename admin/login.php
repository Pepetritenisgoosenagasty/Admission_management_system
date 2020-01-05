<?php
session_start();
    require_once '../config/config.php';
    require_once '../helpers/format_helper.php';
    require_once '../libraries/Database.php';
    $db = new Database;

  $msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = 'SELECT * FROM adminp WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'email' => $_POST['email'],
    ]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $results = $stmt->fetchAll();
        foreach ($results as $row) {
            if (password_verify($_POST['password'], $row->password)) {
                    $_SESSION['user_id'] = $row->id;
                    $_SESSION['user_email'] = $row->email;
                    $_SESSION['user_name'] = $row->name;
                   

                    header("Location:dashboard.php");
            } else {
                $msg = '<label class="text-danger">Password incorrect</label>';
            }
        }
    } else {
        $msg = '<label class="text-danger">Wrong Username</label>';
    }
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

    <title> Admin Login </title>

    <!-- Bootstrap -->
    <link href="inc/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="inc/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="inc/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="inc/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="inc/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login bg-info">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          
          <section class="login_content">
             <img src="inc/images/atu.png" alt="ATU" style="width:200px;">
            <form method="post">
              <h1><strong>Admin</strong> Login</h1>
              <span><strong><?php echo $msg; ?></strong></span>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" />            
              </div>
              <div>
                <button type="submit" class="btn btn-primary btn-block submit" >Log in</button>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
  

                <div class="clearfix"></div>
                <br />

                <div>
                  
                  <p>&copy; <?php echo Date('Y'); ?> ATU All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
