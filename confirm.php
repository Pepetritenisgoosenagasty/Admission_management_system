<?php
$pageTitle = 'Confirmation Page';

include 'inc/header.php';
require_once 'core/init.php';
if (!isset($_SESSION['serial_number'])) {
    header('Location:login.php');
}
$sql = "SELECT * FROM users ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute();
$details = $stmt->fetch();

$sql = "SELECT * FROM course_offered ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute();
$course = $stmt->fetch();
?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        
      </div>
      <div class="col-md-12 col-xs-12 col-ls-12">
        <?php if (isset($_GET['msg'])) : ?>
        <div class="alert alert-success text-center">
            <?= $_GET['msg'] ?>
        </div>
        <?php endif ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="text-info"><i class="fa fa-check-square-o"></i> Confirmation Letter </h3>
          </div>
          <div class="panel-body">
                <?php if (!$details) : ?>
                    <h1>Not Avaliable</h1>
                      <p class="text-danger">Complete form first</p>
                <?php else : ?>
                          <img  src="images/avatars/atu.png" style="height: 50px; ">
                          <div class="col-md-6 col-md-offset-4 ">
                           <img  src="images/profile/<?php echo $details->picProfile ?>" class="thumbnail" alt="" style="margin-top: 50px;">
                         
                        </div>
                        <div class="col-md-12 text-dark">
                            <p>Dear <?php echo $details->surname; ?> <?php echo $details->first_name; ?> <?php echo $details->middle_name; ?> </p>
                            <h4 class="text-center text-dark">APPLICATION CONFIRMATION LETTER</h4>
                          
                          <p class="text-info">Thank you for applying to Accra Technical University for the <?php echo  date("Y") . "/" . date("Y", strtotime("+1 year"))  ;  ?> Academic Year.</p>
                        </div>
                        <div class="col-md-12 text-dark">
                          <h4>You have applied for the following:</h4>
                         <p>First Choice:</p>
                         <p><?= $course->first_choice ?></p>
                         <p>Second Choice:</p>
                         <p><?= $course->second_choice ?></p>
                         <p>Third Choice:</p>
                         <p><?= $course->third_choice ?></p><br><br>
                          <p>Section:</p>
                         <p><?= $course->section ?></p><br><br>
                         <div class="">
                           <p>Sincerely,</p>
                           <p>Accra Technical University (Academic Affairs).</p>
                         </div><br><br>
                         <hr>
                         <a href="" class="btn btn-default" onclick="print()">Print</a>
                         <a href="index.php?id=<?= $_GET['id'] ?>" class="btn btn-info pull-right">Continue</a>
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
setTimeout(() => {
document.querySelector('.alert').remove();
}, 3000);
</script>