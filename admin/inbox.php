<?php
session_start();
$pageTitle = 'Admin | Notification';
include 'inc/header.php';
require_once '../config/config.php';
require_once '../libraries/Database.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$db = new Database;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
    $mail = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $message = '';
    if (empty($mail)) {
        $message = "Field cannot be empty";
    } else {
        try {
            $sql ="INSERT INTO emails(name,subject,email) VALUES(:name,:subject,:email)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':email', $mail);
            if ($stmt->execute()) {
                $msgS = "Message sent successfully";
            }
        } catch (\PDOException $e) {
            echo 'Something went wrong'.$e->getMessage();
            exit();
        }
    }
}
try {
    $sql = 'SELECT * FROM adminp ORDER BY id DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $admin = $stmt->fetch();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
    exit();
}

try {
    $sql = 'SELECT * FROM replies ORDER BY id DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $replies = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Something went wrong'.$e->getMessage();
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
        <h3>Send Notification <small>  <strong></strong></small></h3>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
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
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Send Message</a></li>
            <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Replies</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="activity">
              <div class="box-header ui-sortable-handle" style="cursor: move;">
                
                <h3 class="box-title">Quick Email</h3>
                <form action="" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" value="<?= $admin->name ?>" placeholder="">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                  </div>
                  <div class="form-group">
                    <textarea id="editor" class="form-control" name="email" rows="10" cols="80"></textarea>
                  </div>
                  <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                  <i class="fa fa-arrow-circle-right"></i></button>
                </form>
              </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="settings">
              
              <!-- CONTENT MAIL -->
                <?php foreach ($replies as $reply) : ?>
              <div class="col-sm-9 mail_view">
                <div class="inbox-body">
                  
                  <div class="mail_heading row">
                    <div class="col-md-8">
                      <div class="btn-group">
                        <button class="btn btn-sm btn-default" onclick="print()" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
                        <a class="btn btn-sm btn-default" href="delete.php?id=<?= $reply->id ?>" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></a>
                      </div>
                    </div>
                    <div class="col-md-4 text-right">
                      <p class="date"> <?php echo formatDate(date('Y')); ?></p>
                    </div>
                    <div class="col-md-12">
                    <p>From: <?= $reply->name ?></p>
                    </div>
                  </div>
                  <div class="sender-info">
                    <div class="row">
                      <div class="col-md-12">
                        <strong></strong>
                        <span></span> to
                        <strong>me</strong>
                        <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="view-mail">
                    <p><?= $reply->message ?></p>
                  </div>
                  <hr>
                  
                </div>
              </div>
                <?php endforeach ?>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      
    </section>
    <!-- /.content -->
    
    <br>
    <div class="ln_solid"></div>
  </div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<?php include 'inc/footer.php';?>
<script>
ClassicEditor
.create( document.querySelector( '#editor' ) )
.catch( error => {
console.error( error );
} );
</script>