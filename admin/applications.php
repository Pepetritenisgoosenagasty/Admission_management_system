<?php
   session_start();
   $pageTitle = 'Admin | Applications';
   include 'inc/header.php';
   require_once '../config/config.php';
   require_once '../libraries/Database.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
   $db = new Database;

try {
    $sql = "SELECT users.*,
                    course_offered.section,
                    course_offered.program,
                    course_offered.first_choice,
                    course_offered.second_choice,
                    course_offered.third_choice
                FROM users
                LEFT JOIN course_offered
                ON users.id = course_offered.user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $details = $stmt->fetchAll();
} catch (Exception $e) {
    echo 'Something Happened';
    exit;
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
                <h3>Applications <small>  <?php echo date("Y-m-d"); ?></small></h3>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Applicants <small><?php echo  date("Y") . "/" . date("Y", strtotime("+1 year"))  ;  ?> Batch</small></h2>
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
                          <th>#</th>
                          <th>Title</th>
                          <th>Fullname</th>
                          <th>Email</th>
                          <th>Gender</th>
                          <th>Birth Date</th>
                          <th>Application Type</th>
                          <th>Section</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($details as $detail) : ?>
                          <tr>
                            <td><?= $detail->id ?></td>
                            <td><?= $detail->title ?></td>
                            <td><?= $detail->surname ?> <?= $detail->first_name ?> <?= $detail->middle_name ?></td>
                            <td><?= $detail->email ?></td>
                            <td><?= $detail->gender ?></td>
                            <td><?= $detail->dob  ?></td>
                            <td><?= $detail->section ?></td>
                            <td><?= $detail->program ?></td>
                          <td>
                            <a href="show_form.php?id=<?= $detail->id?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View Form</a>
                            <!-- <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> -->
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
        <!-- /page content -->

    
<?php include 'inc/footer.php';?>
