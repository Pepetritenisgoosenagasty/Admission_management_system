<?php
$pageTitle = 'Notice';

include 'inc/header.php';
require_once 'core/init.php';
if (!isset($_SESSION['serial_number'])) {
    header('Location:login.php');
}
$sql = "SELECT * FROM emails ORDER BY id Asc";
$stmt = $db->prepare($sql);
$stmt->execute();
$emails = $stmt->fetchAll();
?>
<br />
<?php include 'inc/layout/sidebar.php'; ?>
<?php include 'inc/layout/top_navbar.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Notification <small>  <strong></strong></small></h3>
      </div>
       
      <div class="col-md-12 col-sm-12 col-xs-12">
            <?php if (!empty($emails)) : ?>
        <div class="x_panel">
          <div class="x_title">
            <h2><small>Sessions</small></h2>
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
                <?php if (!empty($message)) : ?>
    <div class="alert alert-danger alert-dismissible text-center" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Note</strong>
                    <?= $message ?>
    </div>
    
                <?php endif ?>
                <?php if (!empty($msgS)) : ?>
    <div class="alert alert-success alert-dismissible text-center" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Note</strong>
                    <?= $msgS ?>
    </div>
                <?php endif ?>
    <section class="content container-fluid">
                <?php foreach ($emails as $email) : ?>
      <div class="col-md-12">
         
           <div class="mail_heading row">
                
                    <div class="col-md-8">
                      <div class="btn-group">
                        <button class="btn btn-sm btn-default" onclick="print()" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
                        <a class="btn btn-sm btn-default" href="delete.php?id=<?= $email->id ?>" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></a>
                        <a class="btn btn-sm btn-default"  type="button" data-placement="top" data-toggle="modal" data-original-title="Reply" data-target="#modal-default"><i class="fa fa-reply"></i></a>
                      </div>
                    </div>
                    <div class="col-md-4 text-right">
                      <p class="date"> <?php echo formatDate(date('Y')); ?></p>
                    </div>                   
                    <div class="col-md-12">
                      <h4><?= $email->subject ?></h4> <p class="text-success">From: <?= $email->name ?></p>
                    </div>
                  </div>
                  <div class="sender-info">
                    <div class="row">
                      <div class="col-md-12">            
                      </div>
                    </div>
                  </div>
                  <div class="view-mail">
                    <p><?= $email->email ?></p>
                  </div>
                  <hr>
                
      </div>
                <?php endforeach ?>
    </section>
    <!-- /.content -->
    
    <br>
    <div class="ln_solid"></div>
  </div>
</div>
            <?php else : ?>
  <p class="text-danger">There is notification at the moment</p>
            <?php endif ?>
</div>
        
</div>
</div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = 'INSERT INTO replies(name,message) VALUES(:name,:message)';
    $stmt = $db->prepare($sql);
    $reply = $stmt->execute([
    'name' => $_POST['name'],
    'message' => $_POST['message']
    ]);


    if (isset($reply)) {
        echo '<script>
                alert("Message Sent Successfully");
             const   url = "http://localhost/AdmissionProcessing/notice.php";
                window.location.assign(url);
            </script>';
    }
}
?>

<!-- Modal -->
<div class="modal fade" id="modal-default" style="display: none;">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></button>
    <h4 class="modal-title"> <i class="fa fa-reply"></i> Reply</h4>
  </div>
  <div class="modal-body">
    <form class="" action="" method="POST">
      <div class="form-group">
        <label for="code" class=" control-label">Name</label>
        <div class="">
          <input type="text" class="form-control" name="name" value="<?= $_SESSION['email'] ?>">
        </div>
      </div>
      
      <div class="form-group">
        <label for="number" class=" control-label">Message</label>
        <div class="">
          <textarea name="message" class="form-control" cols="30" rows="4"></textarea>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
     </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    
  </div>
 
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<?php include 'inc/footer.php';?>

