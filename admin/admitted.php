<?php
   $pageTitle = 'Admin | Admitted Students';
   session_start();
   include 'inc/header.php';
    require_once '../config/config.php';
   require_once '../libraries/Database.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$db = new Database;


try {
    $sql = "SELECT * FROM admitted ORDER BY id ASC";
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
                <h3>Admitted Students</h3>
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
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                     <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Fullname</th>
                          <th>Email</th>
                          <th>Gender</th>
                          <th>Address</th>
                          <th>Phone Number</th>
                          <th>Program</th>
                          <th>Course</th>
                          <th>Section</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($students as $student) : ?>
                          <tr>
                            <td><?= $student->id ?></td>
                            <td><?= $student->title ?></td>
                            <td><?= $student->fullname ?></td>
                            <td><?= $student->email ?></td>
                            <td><?= $student->gender  ?></td>
                            <th><?= $student->address ?></th>
                            <td><?= $student->phone_number ?></td>
                            <td><?= $student->program ?></td>
                            <th><?= $student->course ?></th>
                            <th><?= $student->section?></th>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  <

                      <div class="clearfix"></div>

                     
                       
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


    
<?php include 'inc/footer.php';?>
