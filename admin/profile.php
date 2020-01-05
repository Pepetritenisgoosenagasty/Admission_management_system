<?php
session_start();
$pageTitle = 'Admin | Profile';
include 'inc/header.php';
require_once '../config/config.php';
require_once '../helpers/format_helper.php';
require_once '../libraries/Database.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$db = new Database;

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $images = $_FILES['profile']['name'];
    $tmp_dir = $_FILES['profile']['tmp_name'];
    $imageSize = $_FILES['profile']['size'];

    $upload_dir = 'images/profile/';
    $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $valid_extensions = ['jpeg', 'jpg', 'png'];
    $picProfile = rand(1000, 1000000). "." . $imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$picProfile);

    if (isset($_POST['new_password']) != '') {
        $sql = "UPDATE adminp SET name = :name, email = :email, password = :password, picProfile = :picProfile WHERE id = :id";
    } else {
        $sql = "UPDATE adminp SET name = :name, email = :email, picProfile = :picProfile WHERE id = :id";
    }
    
      
        $stmt = $db->prepare($sql);
        $stmt->execute([
          'name' => $_POST['name'],
          'email' => $_POST['email'],
          'password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT),
              'picProfile' =>  $picProfile,
              'id' => $_SESSION['user_id'],
        ]);
        $result = $stmt->fetchAll();

    if (isset($result)) {
        echo '<script>
               alert("Profile Updated Successfully");
               setTimeout(function() {
                const url = "http://localhost/AdmissionProcessing/admin/profile.php";
                window.location.assign(url);
                }, 1000);
             </script>';
    }
}

try {
    $sql = 'SELECT * FROM adminp';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $profile = $stmt->fetch();
} catch (PDOEXception $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}
?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
document.getElementById('blah').src =  e.target.result;
}
reader.readAsDataURL(input.files[0]);
}
}
</script>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-user-plus"></i> Profile <small>  <strong></strong></small></h3>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><small>Edit Profile</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <span class="text-success text-center"><?= $msg ?></span>
     <section class="content container-fluid">
       <form action="" method="post" enctype="multipart/form-data">
         <div class="col-12">
         <p>Please upload a passport size </p>
            <div class="input-group">
                <input type="file" class="form-control" name="profile"  id="imgInp" onchange="readURL(this);"  >
            </div>                    
            <img id="blah" src="images/profile/<?php echo($profile->picProfile) ;?>" class="img-thumbnail" alt="" style="width:200px; height:200px ;">
       </div><br>
       <div class="form-group">
        <label for="name">Name</label>
         <input type="text" name="name" id="name" class="form-control" value="<?php echo $profile->name; ?>">
       </div>
       <div class="form-group">
        <label for="email">Email</label>
         <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo $profile->email; ?>">
       </div>
        <hr>
        <br>
        <p><strong>Leave it blank if you don`t want to change password</strong></p>
         <div class="form-group">
        <label for="password">New Password</label>
         <input type="password" name="new_password" id="new_password" class="form-control form-control-lg" value="">
       </div>
       <div class="form-group">
        <label for="passwprd">Re-Enter Paswword</label>
         <input type="password" name="Cpassword" id="cpassword" class="form-control" value="">
         <span class="error_p"></span>
       </div>
       <div class="form-group">
        
         <input type="submit" class="btn btn-primary pull-right" id="edit_profile" name="submit" value="Edit Profile">
       </div>
       </form>
  </section>
  <!-- /.content -->
    <br>
    <div class="ln_solid"></div>
  </div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<?php include 'inc/footer.php';?>
<script>
  (() => {
    $("#edit_profile").on('click', function(e) {
        if ($('#new_password').val() !== $('#cpassword').val()) {
             $('.error_p').html('<label>Passsword does not match</label>')
        }else {
          $('.error_p').val() = ''
        }
    });
  })();
</script>