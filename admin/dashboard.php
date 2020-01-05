<?php
session_start();
$pageTitle = 'Admin | Dashboard';
include 'inc/header.php';
require_once '../config/config.php';
require_once '../helpers/format_helper.php';
require_once '../libraries/Database.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$db = new Database;

try {
    $sql = "SELECT * FROM admitted";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $students = $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}

try {
    $sql = "SELECT * FROM users";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $users = $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}

try {
    $sql = "SELECT * FROM admitted WHERE program = 'B-TECH'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $btech = $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}

try {
    $sql = "SELECT * FROM admitted WHERE program = 'HND'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $hnd = $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}

try {
    $sql = "SELECT * FROM admitted WHERE program = 'NON-HND'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $non_hnd = $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}

try {
    $sql = "SELECT * FROM admitted";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $admitted = $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}


try {
    $sql = "SELECT * FROM admitted WHERE gender = 'Male' || 'male' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $male = $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}

try {
    $sql = "SELECT * FROM courses";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $courses = $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}


try {
    $sql = "SELECT * FROM admitted WHERE gender = 'Female' ||'female' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $female = $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
<!-- page content -->
<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row tile_count text-center">
    <div class="col-md-4 col-sm-4 col-xs-4 tile_stats_count">
      <span class="count_top"><i class="fa fa-users"></i> Total Number Students</span>
         <div class="count">
            <?php if (!$students) : ?>
                <?= 0 ?>
            <?php else : ?>
                <?= $students ?>
            <?php endif ?>
         </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4 tile_stats_count">
      <span class="count_top"><i class="fa fa-female"></i> Total Number Female Students</span>
      <div class="count text-danger">
        <?php if (!$female) : ?>
            <?= 0 ?>
        <?php else : ?>
                <?= $female ?>
        <?php endif ?>

      </div>
      
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4 tile_stats_count">
      <span class="count_top"><i class="fa fa-male"></i> Total Number Male Students</span>
      <div class="count green">
        <?php if (!$male) : ?>
            <?= 0 ?>
        <?php else : ?>
                <?= $male ?>
        <?php endif ?>
      </div>
      
    </div>
    <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-group"></i>  Part-Time Students</span>
      <div class="count">0</div>
      
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-users"></i> Full-Time Sudents</span>
      <div class="count">0</div>
      
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Number of User</span>
      <div class="count">0</div>
      
    </div> -->
  </div>
  <div class="containter ">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2 style="text-transform: uppercase;"><i class="fa fa-info-circle"></i> Important Shortcuts</h3>
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
    <div class="col-md-6">
      <a href="applications.php">
        <div class="well text-center" style="height: 150px; background: #425668">
          <i class="fa fa-book" style="font-size: 70px; color: #f0f0f0" ></i>
          <p class="" style="font-size: 1.3em; color: #f0f0f0; margin-top: 15px;">Applications</p>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="admitted.php">
        <div class="well text-center" style="height: 150px; background: #425668">
          <i class="fa fa-users" style="font-size: 70px; color: #f0f0f0" ></i>
          <p class="" style="font-size: 1.3em; color: #f0f0f0; margin-top: 15px;">Admitted Students</p>
        </div>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <a href="">
        <div class="well text-center" style="height: 150px; background: #425668">
          <i class="fa fa-list" style="font-size: 70px; color: #f0f0f0" ></i>
          <p class="" style="font-size: 1.3em; color: #f0f0f0; margin-top: 15px;">Students</p>
        </div>
      </a>
    </div>
    <a href="add_courses.php">
      <div class="col-md-6">
        <div class="well text-center" style="height: 150px; background: #425668">
          <i class="fa fa-pencil-square-o" style="font-size: 70px; color: #f0f0f0" ></i>
          <p class="" style="font-size: 1.3em; color: #f0f0f0; margin-top: 15px;">Courses</p>
        </div>
      </a>
    </div>
    
  </div>
  <div class="row">
    <div class="col-md-6">
      <a href="profile.php">
        <div class="well text-center" style="height: 150px; background: #425668">
          <i class="fa fa-user" style="font-size: 70px; color: #f0f0f0" ></i>
          <p class="" style="font-size: 1.3em; color: #f0f0f0; margin-top: 15px;">Profile</p>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="inbox.php">
        <div class="well text-center" style="height: 150px; background: #425668">
          <i class="fa fa-envelope-o" style="font-size: 70px; color: #f0f0f0;" ></i>
          <p class="" style="font-size: 1.3em; color: #f0f0f0; margin-top: 15px;">Notice</p>
        </div>
      </a>
    </div>
    
    <div class="clearfix"></div>
  </div>
</div>
</div>
</div>

<div class="containter ">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2 style="text-transform: uppercase;"><i class="fa fa-info-circle"></i> SCHOOL INFOMATION</h3>
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
    <div class="col-md-6">
      <div class="animated flipInY ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                  <div class="count"><?= $users ?></div>
                  <h3>Number of Applicants</h3>
                </div>
              </div>
    </div>
    <div class="col-md-6">
      <div class="animated flipInY ">
                <div class="tile-stats">
                  <div class="icon" ><i class="fa fa-users" style="margin: 10px 0;"></i></div>
                  <div class="count"><?= $admitted ?></div>
                  <h3>Number of Admitted Students</h3>
                 
                </div>
              </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
<div class="animated flipInY">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users" style="margin: 10px 0;"></i></div>
                  <div class="count"><?= $btech ?></div>
                  <h3>Number of B-Tech Students</h3>
                </div>
              </div>
    </div>
   
      <div class="col-md-6">
        <div class="animated flipInY ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-group" style="margin: 10px 0;"></i></div>
                  <div class="count"><?= $hnd ?></div>
                  <h3>Number of HND Students</h3>
                  
                </div>
              </div>
    </div>
    
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="animated flipInY">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users" style="margin: 10px 0;"></i></div>
                  <div class="count"><?= $non_hnd ?></div>
                  <h3>Number of Non-HND Students</h3>
                </div>
              </div>
    </div>
    <div class="col-md-6">
<div class="animated flipInY">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count"><?= $courses ?></div>
                  <h3>Numbers of Courses</h3>
                </div>
                <div class="clearfix"></div>
  </div>
</div>
</div>
</div>
</div>
</div>
</h2>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

               </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</div>
<div class="clearfix"></div>
</div>
<?php include 'inc/footer.php';?>