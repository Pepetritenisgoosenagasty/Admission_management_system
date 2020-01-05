<?php
$pageTitle = 'Select Exams Type';

include 'inc/header.php';
require_once 'core/init.php';
if (!isset($_SESSION['serial_number'])) {
    header('Location:login.php');
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
                <!-- <h3>Select Exams Type</h3> -->
            </div>
            <div class="title_right">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-graduation-cap"></i> Select Exams Type <small><?php echo formatDate(date('Y')); ?></small></h2>
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
        <div class="panel-body ">
            <div class="container">
                <form role="form" action="form.php?id=<?php echo $_GET['id'] ;?>" method="POST"  id="user_form">
                    <div class="form-group">
                        <label for="num">Select Exams Type</label>
                        <!-- <input type="number" name="num" class="form-control" id=""> -->
                        <select name="num" class="form-control" id="num">
                            <option value="0">-- SELECT EXAMS TYPE --</option>
                            <option value="1">WASSCE (First Attempt)</option>
                            <option value="2">WASSCE (Second Attempt)</option>
                            <option value="3">WASSCE (Third Attempt)</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="submit" name="submit" id="sub" class="btn btn-primary pull-right" >
                    </div>   
                </form>
                <hr>
                <p>For B-Tech, Kindly click here to submit your transcript and certificate</p>
                <a href="academics.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary btn-lg">  HND GCEO/ALevel BACC</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include 'inc/footer.php';?>
