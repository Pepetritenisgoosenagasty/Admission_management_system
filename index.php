<?php
$pageTitle = 'Home';
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
                <h3>Welcome!</h3>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info-circle"></i> Instructions <small></small></h2>
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
            <p>Welcome <strong><?= $_SESSION['first_name'] . " " . $_SESSION['last_name']?></strong>! Your application is in progress. Before you begin with your online application, kindly review the application requirement below.  </p>
           
            <div class="alert alert-info">
                
                <h5><b>Use the following checklist to ensure that your application is complete. Please note that you will not be considered for admission if your application is incomplete.</b></h5>
                <h5> <p><b>  The application must contain the following:</b></p></h5>
                <ul>
                    <li>Official Certificate / Result Slips of the final examinations you have completed</li>
                    <li>Passport-Sized Photograph</li>
                    <li>Birth Certificate(optional) </li>
                </ul>
                <br>
                <br>
                 <h5><b>Application Requirements </b></h5>
                 <p>The application requirements are as follows - each applicant must provide relevant and correct infomation in</p>
                <ul>
                    <li>SSSCE/WASSCE/O`LEVEL applicants must produce WAEC/certified certificate or result.</li>
                    <li>Applicants with other qualifications eg. Diploma/HND must endeavor to add SSSCE/O`LEVEL results/certification to thier diploma qualification.</li>
                </ul>
                <p>Please not that until we have recieved all the requirements your application will not be processed</p>
                <br>
                <br>
                
            </div>
            
                <?php if (isset($_POST['signup'])) : ?>
                    <a href="personal_info.php" style="float:right" style="display: none;"> <button name="signup" class="btn btn-success hvr-grow" style="display: none;">Begin Application<span style="padding-left:10px;" class="glyphicon glyphicon-arrow-right"></span></button></a>
                <?php else : ?>
                        <a href="personal_info.php" style="float:right" > <button name="signup" class="btn btn-success hvr-grow" >Begin Application<span style="padding-left:10px;" class="glyphicon glyphicon-arrow-right"></span></button></a>
                <?php endif ?>
                
           
            
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php include 'inc/footer.php';?>
