
<?php
 require_once __DIR__ . '/core/init.php';
 $error_msg = '';
 $serial_number = serial_number(20);
 $pin_code = pin_code(10);
if (isset($_POST['login'])) {
    $sql = 'SELECT * FROM user_details WHERE serial_number = :serial_number';
    $stmt = $db->prepare($sql);
    $stmt->execute([
      'serial_number' => $_POST['serial_number']
    ]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $results = $stmt->fetchAll();
        foreach ($results as $row) {
            if ($_POST['pin_code'] == $row->pin_code) {
                $_SESSION['user_id'] = $row->id;
                $_SESSION['first_name'] = $row->first_name;
                $_SESSION['last_name'] = $row->last_name;
                $_SESSION['email'] = $row->email;
                $_SESSION['serial_number'] = $row->serial_number;
                $_SESSION['pin_code'] = $row->pin_code;

                header('location:index.php');
            } else {
                $error_msg = '<label class="text-danger">Invalid PIN</label>';
            }
        }
    } else {
        $error_msg = '<label class="text-danger">Invalid Serial Number</label>';
    }
} elseif (isset($_POST['register'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = 'INSERT INTO user_details (first_name, last_name, email, serial_number , pin_code) 
            VALUES (:first_name, :last_name, :email, :serial_number , :pin_code)';
        $stmt = $db->prepare($sql);
        $register = $stmt->execute([
        'first_name' => $_POST['first_name'],
        'last_name'=> $_POST['last_name'],
        'email' => $_POST['email'],
        'serial_number'=> $serial_number,
        'pin_code'=> $pin_code
        ]);

        if (isset($register)) {
            header('Location:login.php?msg='.urlencode('Registered Successfully').'#signin');
        }
    }
}

try {
    $sql = 'SELECT * FROM user_details ORDER BY id DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $code = $stmt->fetch();
} catch (\PDOException $e) {
    echo '<div class="alert alert-danger">Unable to Fetch</div>';
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

    <title> Admission Portal </title>

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

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
       <!--<div class="container">
         <nav class="nav navbar bg-primary">
           <a href="" class="brand-header">Hello</a>
         </nav>
       </div> -->
        
      <div class="login_wrapper">
        <div class="animate form login_form">
            <?php if (isset($_GET['msg'])) : ?>
          <div class="alert alert-success"><i class="fa fa-warning"></i> <strong><?= $_GET['msg'] ?></strong> Kindly login with the provided serial number <?= $code->serial_number ?> and pin code <?= $code->pin_code ?></div>
            <?php endif ?>
          <section class="login_content">
             <img src="inc/images/atu.png" alt="ATU" style="width:200px;">
            <form method="post">
              <h1>Login</h1>
              <p><?= $error_msg ?></p>
                <?= $_SESSION['serial_number'] ?>
              <div>
                <input type="text" class="form-control" name="serial_number" placeholder="Serial Number" value="<?= $code->serial_number ?>" required="" />
                
              </div>
              <div>
                <input type="password" class="form-control" placeholder="PIN" name="pin_code" value="" required="" />
                
              </div>
              <div>
                <button type="submit" class="btn btn-success btn-block submit" name="login">Log in</button>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Don`t have serial number and pin yet? <br>
                  <a href="#signup" class="to_register"> Create Account to get pin code and serial number</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i>  Admission Portal</h1>
                  <p>&copy; <?php echo Date('Y'); ?> ATU All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
       
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <img src="inc/images/atu.png" alt="ATU" style="width:200px;  margin-top:0;">
            <form method="POST">
              <h1>Register</h1>
              <div>
                <input type="text" class="form-control" placeholder="First Name" name="first_name" required="" />
              </div>
               <div>
                <input type="text" class="form-control" placeholder="Last Name" name="last_name" required="" />
              </div>
              <!--  <div>
                <p><strong>Type characters into into the security code field</strong></p>
                <div class="character"><?php echo security_code(6); ?></div>
                <input type="text" class="form-control" placeholder="Security Code" required="" />
              </div> -->
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required="" />
              </div>
              <!--<div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div> -->
              <div>
                <button type="submit" class="btn btn-primary submit btn-block" name="register">Register</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <hr>
                <p class="change_link">Already have pin code and serial number ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i>  Admission Portal</h1>
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
