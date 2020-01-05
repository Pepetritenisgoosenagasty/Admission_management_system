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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course = trim(filter_input(INPUT_POST, 'course', FILTER_SANITIZE_STRING));
     
    
    if (!empty($course)) {
        try {
            $sql ="INSERT INTO courses(course_name) VALUES(:course)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':course', $course);
            $course = $stmt->execute();
            if ($course) {
                $msg = '<div class="alert alert-success">Course added successfully</div>';
            }
        } catch (\PDOException $e) {
             echo '<script>
                       alert("Course Added Successfully");
                    </script>';
        }
    } else {
    }
}



$sql ="SELECT * FROM courses";
$stmt = $db->prepare($sql);
$stmt->execute();
$courses = $stmt->fetchAll();
?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>List of all courses <small>  <strong></strong></small></h3>
        
      </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Add Course <small></small></h2>
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
                    
                    <div class="row">
                       <form action="" method="POST">
                        <div class="col-md-10">
                          <div class="form-group">
                            <input type="text" class="form-control course" name="course" placeholder="Add Course..">
                          </div>
                        </div>
                      <div class="col-md-2">
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Course">
                      </div>
                      </div>
                    </form>
                    </div>
                   
                    <hr>
                    <h3>List of Courses</h3>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Courses</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($courses as $course) : ?>
                          <tr>
                          <td><?= $course->id ?></td>
                          <td><?= $course->course_name ?></td>
                          <td>
                            <a href="edit_course.php?id=<?= $course->id ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Edit </a>
                            <a href="delete_course.php?id=<?= $course->id ?>" Onclick="return confirm(Are you sure?)" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> Delete </a> 
                            <!-- <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> -->
                          </td>
                        </tr>
                        <?php endforeach ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php include 'inc/footer.php';?>
<script>
  const form = document.querySelector('form');
  const course = document.querySelector('.course');

  form.addEventListener('submit', () => {
   
      if (course.value === '') {
        alert("Field cannot be empty");
      }
  });

</script>
