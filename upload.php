<?php
$pageTitle = 'Upload Certificate';

include 'inc/header.php';
require_once 'core/init.php';
if (!isset($_SESSION['serial_number'])) {
    header('Location:login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $images = $_FILES['wassce']['name'];
    $tmp_dir = $_FILES['wassce']['tmp_name'];
    $imageSize = $_FILES['wassce']['size'];

    $upload_dir = 'images/multifiles/';
    $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $valid_extensions = ['jpeg', 'jpg', 'png', 'pdf'];
    $waccse = rand(1000, 1000000). "." . $imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$waccse);

    $images = $_FILES['birth_cert']['name'];
    $tmp_dir = $_FILES['birth_cert']['tmp_name'];
    $imageSize = $_FILES['birth_cert']['size'];

    $upload_dir = 'images/multifiles/';
    $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $valid_extensions = ['jpeg', 'jpg', 'png', 'pdf'];
    $certs = rand(1000, 1000000). "." . $imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$certs);
              
    $sql = "INSERT INTO files(user_id, wassce_cert,birth_cert) VALUES(:user_id,:wassce_cert,:birth_cert)";
                            $insert = $db->prepare($sql);
                             $insert->bindParam(':user_id', $id);
                             $insert->bindParam(':wassce_cert', $waccse);
                             $insert->bindParam(':birth_cert', $certs);
    if ($insert->execute()) {
        header("Location: course_selection.php?id=$id");
        exit;
    } else {
        echo '<script>alert("Invalid File Type")</script>';
    }
}
?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>

<script>
  
</script>
    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Certificate Upload </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-image"></i> Upload your exams and birth(optional) certificates</h2>
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
                    <div class="alert alert-info"><i class="fa fa-warning"></i> <strong>NB:</strong> Click to select  files to upload . <strong>WASSCE/NOVDEC</strong> certificate is needed without it you cannot proceed to the next stage.</div>
                      <form action="" method="post" enctype="multipart/form-data" data-parsley-validate >
            <table class="table table-responsive table-bordered ">
                <tbody><tr>
                    <th class="active">Upload Wassce Certificate</th>
                    <th class="active">Upload Birth certificate (Optional)</th>
                    
                </tr>
                <tr>
                    <td class="">
                        <div class="input-group">
                            <input type="file" class="form-control" name="wassce" required="true">
                        </div>
                        
                    </td>
                    <td class="">
                        
                        <div class="input-group">
                            <input type="file" class="form-control"  name="birth" >
                        </div>
                    </td>
                    
                </tr>
            </tbody>
        </table>
        <div class="form-group">
            <input type="submit" class="btn btn-primary pull-right" value="Submit">
        </div>
        </form>

                    <br>
                   
                    <br />
                    <br />
                    <br />
                    <br />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include 'inc/footer.php';?>

