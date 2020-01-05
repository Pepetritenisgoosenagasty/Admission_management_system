<?php
session_start();
$pageTitle = 'Admin | Courses';
include 'inc/header.php';
require_once '../config/config.php';
require_once '../libraries/Database.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$db = new Database;

$id = $_GET['id'];
$sql ="SELECT * FROM courses WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$courses = $stmt->fetch();

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course = trim(filter_input(INPUT_POST, 'course', FILTER_SANITIZE_STRING));
    
    try {
        $sql ="UPDATE courses SET course_name = :course WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->bindParam(':course', $course);
        if ($stmt->execute()) {
            echo '<script>
           alert("Course Updated Successfully");
           const url = "http://localhost/AdmissionProcessing/admin/add_courses.php";
           window.location.assign(url);
        </script>';
        }
    } catch (\PDOException $e) {
        echo 'Something went wrong'. $e->getMessage();
        exit;
    }
}


?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit course <small>  <strong></strong></small></h3>
        
      </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Edit Course <small></small></h2>
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
                    <?php if (!empty($message)) :?>
                        <div class="alert alert-success">
                        <?= $msg; ?>
                         </div>
                    <?php endif;?>
                    <form action="" method="POST">
                      <div class="form-group">
                        <input type="text" class="form-control course" name="course" value="<?php echo $courses->course_name;?>"><br>
                        <input type="submit" class="
                        btn btn-primary" value="Update Course">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php include 'inc/footer.php';?>
