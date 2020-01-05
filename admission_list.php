<?php
  $pageTitle = 'Admission List';

include 'inc/header.php';
require_once 'core/init.php';
if (!isset($_SESSION['serial_number'])) {
    header('Location:login.php');
}
try {
    $sql = "SELECT * FROM admitted";
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
                <h3> <small>  <?php echo date("Y-m-d"); ?></small></h3>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php if (empty($details)) : ?>
              <p class="text-danger text-center">Admission List is not avaliable</p>
            <?php else : ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admission Lists <small><?php echo  date("Y") . "/" . date("Y", strtotime("+1 year"))  ;  ?> Batch</small></h2>
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
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>Title</th>
                          <th>Fullname</th>
                          <th>Gender</th>
                          <th>Email</th>
                          <th>Program</th>
                          <th>Section</th>
                          <th>Actions</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($details as $detail) : ?>
                          <tr>
                          <td><?= $detail->title ?></td>
                          <td><?= $detail->surname ?> <?= $detail->first_name ?> <?= $detail->middle_name ?></td>
                          <td><?= $detail->gender ?></td>
                          <td><?= $detail->email ?></td>
                          <td><?= $detail->program ?></td>
                          <td><?= $detail->section ?></td>
                          <td><a href="" class="btn btn-primary"><i class="fa fa-print"></i> Print Admission Form</a></td>
                        </tr>   
                        <?php endforeach ?>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
            <?php endif ?>
              </div>

        </div>
<?php include 'inc/footer.php';?>

