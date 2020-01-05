<?php
$pageTitle = 'Profile Page';

include 'inc/header.php';
require_once 'core/init.php';

if (!isset($_SESSION['user_id'])) {
    header('Location:login.php');
}
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([
  'id' => $_GET['id'],
]);
$details = $stmt->fetch();


$sql = "SELECT * FROM academic_info  WHERE user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([
  ':id' => $_GET['id'],
]);
$results = $stmt->fetchAll();


$sql = "SELECT * FROM course_offered WHERE user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([
  'id' => $_GET['id'],
]);
$courses = $stmt->fetch();


$sql = "SELECT * FROM hnd WHERE user_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([
  'id' => $_GET['id'],
]);
$hnd = $stmt->fetch();
?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Profile  <small></small></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-briefcase"></i> Profile Page</h2>
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
    <br>
    <?php if (!$details) : ?>
    <h1>Not Avaliable</h1>
    <p class="text-danger">Complete form first</p>
    <?php else : ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="text-info"><i class="fa fa-user"></i> Personal Information Section</h4>
        </div>
        <div class="panel-body">
          <div class="col-md-3">
            <?php if (!$details->picProfile) : ?>
            <img  src="images/avatars/user.png" class="thumbnail" alt="" style="width: 200px;">
            <?php else : ?>
            <img  src="images/profile/<?php echo $details->picProfile ?>" class="thumbnail" alt="" style="width: 200px;">
            <?php endif ?>
            
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" value="<?= $details->title ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Surname:</label>
              <input type="text" class="form-control" value="<?= $details->surname ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">First Name:</label>
              <input type="text" class="form-control" value="<?= $details->first_name ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Middle Name:</label>
              <input type="text" class="form-control" value="<?= $details->middle_name ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Gender:</label>
              <input type="text" class="form-control" value="<?= $details->gender ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Email:</label>
              <input type="text" class="form-control" value="<?= $details->email ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Date of Birth:</label>
              <input type="text" class="form-control" value="<?= $details->dob ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Place of Birth:</label>
              <input type="text" class="form-control" value="<?= $details->place_of_birth ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Nationality:</label>
              <input type="text" class="form-control" value="<?= $details->nationality ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Marital Status:</label>
              <input type="text" class="form-control" value="<?= $details->marital_status ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Contact:</label>
              <input type="text" class="form-control" value="<?= $details->contact ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Postal Address:</label>
              <input type="text" class="form-control" value="<?= $details->postalAddress ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Religion:</label>
              <input type="text" class="form-control" value="<?= $details->religion ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Denomination:</label>
              <input type="text" class="form-control" value="<?= $details->denomination ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Other specify:</label>
              <input type="text" class="form-control" value="<?= $details->otherSpecify ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Sponsor Title:</label>
              <input type="text" class="form-control" value="<?= $details->sponsor_t ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Sponsor Fullname:</label>
              <input type="text" class="form-control" value="<?= $details->sponsor_fullname ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Sponsor Relationship:</label>
              <input type="text" class="form-control" value="<?= $details->sponsor_relation ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Sponsor Occupation:</label>
              <input type="text" class="form-control" value="<?= $details->sponsor_oc ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Sponsor Email:</label>
              <input type="text" class="form-control" value="<?= $details->sponsor_mail ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Sponsor Contact:</label>
              <input type="text" class="form-control" value="<?= $details->sponsor_contact ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Sponsor Address:</label>
              <input type="text" class="form-control" value="<?= $details->sponsor_address ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Disability:</label>
              <input type="text" class="form-control" value="<?= $details->disability ?>" disabled="true">
            </div>
          </div>
          
        </div>
      </div>
    </div>
        <?php if (isset($results)) : ?>
            <?php foreach ($results as $result) : ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="text-info"><i class="fa fa-archive"></i> Academic History</h4>
        </div>
        <div class="panel-body">
          <p class="text-center"><?= $result->cert ?></p>
          <div class="col-md-4">
            <div class="form-group">
              <label for="title">School Region:</label>
              <input type="text" class="form-control" value="<?= $result->school_region ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">School Name:</label>
              <input type="text" class="form-control" value="<?= $result->school_name ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Field of Study:</label>
              <input type="text" class="form-control" value="<?= $result->field_of_study ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Qualification:</label>
              <input type="text" class="form-control" value="<?= $result->cert ?>" disabled="true">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="title">Mathematics:</label>
              <input type="text" class="form-control" value="<?= $result->mathematics ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">English Language:</label>
              <input type="text" class="form-control" value="<?= $result->english_language ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Social Studies:</label>
              <input type="text" class="form-control" value="<?= $result->social_studies ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title">Intergrated Science:</label>
              <input type="text" class="form-control" value="<?= $result->science ?>" disabled="true">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="title"><?= $result->first_elective ?>:</label>
              <input type="text" class="form-control" value="<?= $result->grade ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title"><?= $result->second_elective ?>:</label>
              <input type="text" class="form-control" value="<?= $result->grades ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title"><?= $result->third_elective ?>:</label>
              <input type="text" class="form-control" value="<?= $result->gradess ?>" disabled="true">
            </div>
            <div class="form-group">
              <label for="title"><?= $result->fourth_elective ?>:</label>
              <input type="text" class="form-control" value="<?= $result->gradesss ?>" disabled="true">
            </div>
            
          </div>
        </div>
      </div>
    </div>
            <?php endforeach ?>
        <?php elseif (isset($hnd)) : ?>
    <div class="col-md-12 text-center">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="text-danger text-center">Click to download</h4>
        </div>
        <div class="panel-body">
          
          <a href="images/transcript/<?php echo $hnd->hnd_transcript; ?>" class="btn btn-primary">Transcript</a>
          <a href="images/certs/<?php echo $hnd->hnd_certificate; ?>" class="btn btn-info">Certificate</a>
        </div>
      </div>
    </div>
        <?php endif ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="text-info"><i class="fa fa-archive"></i> Courses</h4>
        </div>
        <div class="panel-body">
          <p class="text-center">COURSE SELECTION</p>
          <div class="col-md-12">
            <div class="form-group">
              <label for="title">Section:</label>
              <input type="text" class="form-control" value="<?= $courses->section ?>" disabled="true">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="title">Program:</label>
              <input type="text" class="form-control" value="<?= $courses->program ?>" disabled="true">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="title">First Choice:</label>
              <input type="text" class="form-control" value="<?= $courses->first_choice ?>" disabled="true">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="title">Second Choice:</label>
              <input type="text" class="form-control" value="<?= $courses->second_choice ?>" disabled="true">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="title">Third Choice:</label>
              <input type="text" class="form-control" value="<?= $courses->third_choice ?>" disabled="true">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
    <?php endif ?>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<?php include 'inc/footer.php';?>
<script>
  
</script>