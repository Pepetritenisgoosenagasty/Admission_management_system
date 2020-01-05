<?php
session_start();
   $pageTitle = 'Admin | Full-Time Students(HND)';
   include 'inc/header.php';
   require_once '../config/config.php';
   require_once '../libraries/Database.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$db = new Database;


try {
    $sql = "SELECT * FROM admitted WHERE program = 'HND' AND section = 'Full-Time' ORDER BY id DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $students = $stmt->fetchAll();
} catch (\PDOException $e) {
    echo 'something went wrong'. $e->getMessage();
    exit();
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
                <h3><i class="fa fa-group"></i>  Full Time Students(HND)  <small>  <?php echo date("Y-m-d"); ?></small></h3>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Full Time Hnd Students <small></small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>Title</th>
                          <th>Fullname</th>
                          <th>Email</th>
                          <th>Gender</th>
                          <th>Phone Number</th>
                          <th>Address</th>
                          <th>Program</th>
                          <th>Section</th>
                          <th>Course</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($students as $student) : ?>
                          <tr>
                          <td><?= $student->title ?></td>
                          <td><?= $student->fullname ?></td>
                          <td><?= $student->email ?></td>
                           <td><?= $student->gender ?></td>
                          <td><?= $student->phone_number ?></td>
                          <td><?= $student->address ?></td>
                          <td><?= $student->program?></td>
                           <td><?= $student->section ?></td>
                           <td><?= $student->course ?></td>
                        </tr>
                        <?php endforeach ?>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

        </div>
        <!-- /page content -->

    
<?php include 'inc/footer.php';?>
