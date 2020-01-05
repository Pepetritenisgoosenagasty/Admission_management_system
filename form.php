<?php

$pageTitle = 'Select Exams Type';

include 'inc/header.php';
require_once 'core/init.php';
// if (!isset($_SESSION['serial_number'])) {
//     header('Location:login.php');
// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                        <h2><i class="fa fa-graduation-cap"></i> Input Results<small><?php echo formatDate(date('Y')); ?></small></h2>
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
                <form role="form" action="insert.php?id=<?php echo $_GET['id'] ;?>" method="POST" id="add_course" >
                    <?php
                    if (isset($_POST['submit'])) {
                        $num = $_POST['num'];
                        for ($i = 0; $i < $num; $i++) {
                            ?>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default" id="firstInput" style="display: ;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Input your Exams Results </h3>
                                </div>
                                <div class="panel-body">
                                    <h4>School Details</h4>
                                    <hr>
                                    <table class="table table-responsive table-bordered">
                                        
                                        <tbody>
                                            <tr>
                                                <th class="active">School Region</th>
                                                <th class="active">Name of School</th>
                                                <th class="active">Field Of Study</th>
                                                <th class="active">Qualification</th>
                                            </tr>
                                            
                                            <tr>
                                                <td class="active">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select name="school_region[]" size="1" class="form-control">
                                                                <option value="">-- Select region --</option>
                                                                <option value="Greater Accra">Greater Accra</option>
                                                                <option value="Central Region">Central Region</option>
                                                                <option value="Ashanti Region">Ashanti Region</option>
                                                                <option value="Eastern Region">Easten Region</option>
                                                                <option value="Western Region">Western Region</option>
                                                                <option value="Upper East Region">Upper East Region</option>
                                                                <option value="Upper West Region">Upper West Region</option>
                                                                <option value="Nothern Region">Northen Region</option>
                                                                <option value="Volta Region">Volta Region</option>
                                                                <option value="Brong-Ahafo Region">Brong Ahafo Region</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="active">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <div class="inner-addon right-addon">
                                                                <input type="text" class="form-control" name="school_name[]" value="" placeholder=" Name of School">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                <td class="active">
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select id="field_of_sturdy" name="field_of_study[]" size="1" class="form-control">
                                                                <option value="">-- Select field of study --</option>
                                                                <option value="Business">Business</option>
                                                                <option value="General Agric">General Agric</option>
                                                                <option value="General Science">General Science</option>
                                                                <option value="General Arts">General Arts</option>
                                                                <option value="Visual Arts">Visual Arts</option>
                                                                <option value="Technical">Technical</option>
                                                                <option value="Home Economics">Home Economics</option>
                                                                
                                                            </select>
                                                            
                                                        </div>
                                                    </div>

                                                </td>
                                                 
                                                <td class="active">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select id="qualification" name="cert[]" size="1" class="form-control">
                                                                <option value=" ">-- Select qualification--</option>
                                                                <option id="wassce" value="WASSCE">WASSCE</option>
                                                                <option id="wassce" value="SSCE">SSCE</option>
                                                                <option value="NOVDEC">NovDec</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                        
                                        <h4>Core Subjects</h4>
                                        <hr>
                                        <table class="table table-responsive table-bordered">
                                            <tbody><tr>
                                                <th class="defactive">Core Mathematics</th>
                                                <th class="defactive">English Language</th>
                                                <th class="defactive">Intergrated Science</th>
                                                <th class="defactive">Social Studies</th>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select name="mathematics[]" size="1" class="form-control">
                                                                <option value="">-- Select grade --</option>
                                                                <option value="A1">A1</option>
                                                                <option value="B2">B2</option>
                                                                <option value="B3">B3</option>
                                                                <option value="C4">C4</option>
                                                                <option value="C5">C5</option>
                                                                <option value="C6">C6</option>
                                                                <option value="D7">D7</option>
                                                                <option value="E8">E8</option>
                                                                <option value="F9">F9</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                <td class="">
                                                    <div class="form-group">
                                                        
                                                        <div class="col-sm-12">
                                                            <select name="english_language[]" size="1" class="form-control">
                                                                <option value="">-- Select grade --</option>
                                                                <option value="A1">A1</option>
                                                                <option value="B2">B2</option>
                                                                <option value="B3">B3</option>
                                                                <option value="C4">C4</option>
                                                                <option value="C5">C5</option>
                                                                <option value="C6">C6</option>
                                                                <option value="D7">D7</option>
                                                                <option value="E8">E8</option>
                                                                <option value="F9">F9</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select name="social_studies[]" size="1" class="form-control">
                                                                <option value="">-- Select grade --</option>
                                                                <option value="A1">A1</option>
                                                                <option value="B2">B2</option>
                                                                <option value="B3">B3</option>
                                                                <option value="C4">C4</option>
                                                                <option value="C5">C5</option>
                                                                <option value="C6">C6</option>
                                                                <option value="D7">D7</option>
                                                                <option value="E8">E8</option>
                                                                <option value="F9">F9</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select name="science[]" size="1" class="form-control">
                                                                <option value="">-- Select grade --</option>
                                                                <option value="A1">A1</option>
                                                                <option value="B2">B2</option>
                                                                <option value="B3">B3</option>
                                                                <option value="C4">C4</option>
                                                                <option value="C5">C5</option>
                                                                <option value="C6">C6</option>
                                                                <option value="D7">D7</option>
                                                                <option value="E8">E8</option>
                                                                <option value="F9">F9</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h4>Elective Subjects</h4>
                                    <hr>
                                    <table class="table table-responsive table-bordered ">
                                        <tbody><tr>
                                            <th class="active">Subject</th>
                                            <th class="active">Grade</th>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <div class="col-sm-12">
                                                    <select name="first_elective[]" size="1" placeholder="elective course" class="form-control">
                                                        <option value="">-- Select subject --</option>
                                                        <option value="Agricultural Science">Agricultural Science</option>
                                                        
                                                        <option value="Animal Husbandry ">Animal Husbandry </option>
                                                        
                                                        <option value="Auto Body Repairs ">Auto Body Repairs </option>
                                                        
                                                        <option value="Auto Electrical Work ">Auto Electrical Work </option>
                                                        
                                                        <option value="Auto Mechanics">Auto Mechanics</option>
                                                        
                                                        <option value="Auto Mechanical Work">Auto Mechanical Work</option>
                                                        
                                                        <option value="Basic Electronics / Electronics ">Basic Electronics / Electronics </option>
                                                        
                                                        <option value="Basic Electricity / Applied Electricity">Basic Electricity / Applied Electricity</option>
                                                        
                                                        <option value="Biology">Biology</option>
                                                        
                                                        <option value="Auto Parts Merchandising">Auto Parts Merchandising</option>
                                                        
                                                        <option value="Block Laying/Brick Concreting">Block Laying/Brick Concreting</option>
                                                        
                                                        <option value=" Basketry"> Basketry</option>
                                                        
                                                        <option value="Building Construction">Building Construction</option>
                                                        
                                                        <option value="Catering Craft Practice">Catering Craft Practice</option>
                                                        
                                                        <option value="Ceramics">Ceramics</option>
                                                        
                                                        <option value="Christian Religious Studies">Christian Religious Studies</option>
                                                        
                                                        <option value="Civic Education">Civic Education</option>
                                                        
                                                        <option value="Clothing/ Textiles">Clothing/ Textiles</option>
                                                        
                                                        <option value="Commerce">Commerce</option>
                                                        
                                                        <option value="Computer Studies ">Computer Studies </option>
                                                        
                                                        <option value="Cosmetology ">Cosmetology </option>
                                                        
                                                        <option value="Cost Accounting">Cost Accounting</option>
                                                        
                                                        <option value="Crop Husbandry/ Horticulture ">Crop Husbandry/ Horticulture </option>
                                                        
                                                        <option value=" Data Processing "> Data Processing </option>
                                                        
                                                        <option value="Economics ">Economics </option>
                                                        
                                                        <option value="Elective / Further Mathematics ">Elective / Further Mathematics </option>
                                                        
                                                        <option value="Electrical Installation And Maintenance Work">Electrical Installation And Maintenance Work</option>
                                                        
                                                        <option value="Electronics">Electronics</option>
                                                        
                                                        <option value="Arabic ">Arabic </option>
                                                        
                                                        <option value="Financial Accounting ">Financial Accounting </option>
                                                        
                                                        <option value="Fisheries">Fisheries</option>
                                                        
                                                        <option value=" Food And Nutrition "> Food And Nutrition </option>
                                                        
                                                        <option value="Forestry ">Forestry </option>
                                                        
                                                        <option value="French ">French </option>
                                                        
                                                        <option value="Furniture Making ">Furniture Making </option>
                                                        
                                                        <option value="General Knowledge In Art ">General Knowledge In Art </option>
                                                        
                                                        <option value="Geography">Geography</option>
                                                        
                                                        <option value="Ghanaian Languages ">Ghanaian Languages </option>
                                                        
                                                        <option value=" Government "> Government </option>
                                                        
                                                        <option value="  Graphic Design ">  Graphic Design </option>
                                                        
                                                        <option value="GSM Phones Maintenance And Repairs ">GSM Phones Maintenance And Repairs </option>
                                                        
                                                        <option value=" Hausa "> Hausa </option>
                                                        
                                                        <option value="Twi">Twi</option>
                                                        
                                                        <option value="Health Education ">Health Education </option>
                                                        
                                                        <option value=" History "> History </option>
                                                        
                                                        <option value=" Home Management "> Home Management </option>
                                                        
                                                        <option value=" Ibibio "> Ibibio </option>
                                                        
                                                        <option value="  Igbo ">  Igbo </option>
                                                        
                                                        <option value="Information And Communication Technology (Elective">Information And Communication Technology (Elective</option>
                                                        
                                                        <option value="Islamic Studies ">Islamic Studies </option>
                                                        
                                                        <option value="Leather Goods ">Leather Goods </option>
                                                        
                                                        <option value=" Leatherwork "> Leatherwork </option>
                                                        
                                                        <option value="Literature In English ">Literature In English </option>
                                                        
                                                        <option value=" Machine Woodworking "> Machine Woodworking </option>
                                                        
                                                        <option value="Marketing">Marketing</option>
                                                        
                                                        <option value="Metalwork ">Metalwork </option>
                                                        
                                                        <option value="Mining ">Mining </option>
                                                        
                                                        <option value="Office Practice ">Office Practice </option>
                                                        
                                                        <option value="Painting And Decorating ">Painting And Decorating </option>
                                                        
                                                        <option value="Physical Education ">Physical Education </option>
                                                        
                                                        <option value="Physics ">Physics </option>
                                                        
                                                        <option value="Picture Making ">Picture Making </option>
                                                        
                                                        <option value="Printing Craft Practise ">Printing Craft Practise </option>
                                                        
                                                        <option value="Radio, Television And Electronics Works ">Radio, Television And Electronics Works </option>
                                                        
                                                        <option value="Salesmanship">Salesmanship</option>
                                                        
                                                        <option value="Sculpture ">Sculpture </option>
                                                        
                                                        <option value="Shorthand ">Shorthand </option>
                                                        
                                                        <option value="Store Management ">Store Management </option>
                                                        
                                                        <option value="Technical Drawing ">Technical Drawing </option>
                                                        
                                                        <option value=" Textiles "> Textiles </option>
                                                        
                                                        <option value="Tourism">Tourism</option>
                                                        
                                                        <option value=" Upholstery "> Upholstery </option>
                                                        
                                                        <option value="Visual Art ">Visual Art </option>
                                                        
                                                        <option value="Welding And Fabrication Engineering Craft Practice">Welding And Fabrication Engineering Craft Practice</option>
                                                        
                                                        <option value="West African Traditional Religion (W.A.T.R) ">West African Traditional Religion (W.A.T.R) </option>
                                                        
                                                        <option value=" Woodwork "> Woodwork </option>
                                                        
                                                        <option value="Yoruba">Yoruba</option>
                                                        
                                                        <option value="Chemistry">Chemistry</option>
                                                        
                                                        <option value="Management In Living ">Management In Living </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <select name="grade[]" size="1" class="form-control">
                                                            <option value="">-- Select grade --</option>
                                                            <option value="A1">A1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B3">B3</option>
                                                            <option value="C4">C4</option>
                                                            <option value="C5">C5</option>
                                                            <option value="C6">C6</option>
                                                            <option value="D7">D7</option>
                                                            <option value="E8">E8</option>
                                                            <option value="F9">F9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <div class="col-sm-12">
                                                    <select name="second_elective[]" size="1" placeholder="elective course" class="form-control">
                                                        <option value="">-- Select subject --</option>
                                                        <option value="Agricultural Science">Agricultural Science</option>
                                                        
                                                        <option value="Animal Husbandry ">Animal Husbandry </option>
                                                        
                                                        <option value="Auto Body Repairs ">Auto Body Repairs </option>
                                                        
                                                        <option value="Auto Electrical Work ">Auto Electrical Work </option>
                                                        
                                                        <option value="Auto Mechanics">Auto Mechanics</option>
                                                        
                                                        <option value="Auto Mechanical Work">Auto Mechanical Work</option>
                                                        
                                                        <option value="Basic Electronics / Electronics ">Basic Electronics / Electronics </option>
                                                        
                                                        <option value="Basic Electricity / Applied Electricity">Basic Electricity / Applied Electricity</option>
                                                        
                                                        <option value="Biology">Biology</option>
                                                        
                                                        <option value="Auto Parts Merchandising">Auto Parts Merchandising</option>
                                                        
                                                        <option value="Block Laying/Brick Concreting">Block Laying/Brick Concreting</option>
                                                        
                                                        <option value=" Basketry"> Basketry</option>
                                                        
                                                        <option value="Building Construction">Building Construction</option>
                                                        
                                                        <option value="Catering Craft Practice">Catering Craft Practice</option>
                                                        
                                                        <option value="Ceramics">Ceramics</option>
                                                        
                                                        <option value="Christian Religious Studies">Christian Religious Studies</option>
                                                        
                                                        <option value="Civic Education">Civic Education</option>
                                                        
                                                        <option value="Clothing/ Textiles">Clothing/ Textiles</option>
                                                        
                                                        <option value="Commerce">Commerce</option>
                                                        
                                                        <option value="Computer Studies ">Computer Studies </option>
                                                        
                                                        <option value="Cosmetology ">Cosmetology </option>
                                                        
                                                        <option value="Cost Accounting">Cost Accounting</option>
                                                        
                                                        <option value="Crop Husbandry/ Horticulture ">Crop Husbandry/ Horticulture </option>
                                                        
                                                        <option value=" Data Processing "> Data Processing </option>
                                                        
                                                        <option value="Economics ">Economics </option>
                                                        
                                                        <option value="Elective / Further Mathematics ">Elective / Further Mathematics </option>
                                                        
                                                        <option value="Electrical Installation And Maintenance Work">Electrical Installation And Maintenance Work</option>
                                                        
                                                        <option value="Electronics">Electronics</option>
                                                        
                                                        <option value="Arabic ">Arabic </option>
                                                        
                                                        <option value="Financial Accounting ">Financial Accounting </option>
                                                        
                                                        <option value="Fisheries">Fisheries</option>
                                                        
                                                        <option value=" Food And Nutrition "> Food And Nutrition </option>
                                                        
                                                        <option value="Forestry ">Forestry </option>
                                                        
                                                        <option value="French ">French </option>
                                                        
                                                        <option value="Furniture Making ">Furniture Making </option>
                                                        
                                                        <option value="General Knowledge In Art ">General Knowledge In Art </option>
                                                        
                                                        <option value="Geography">Geography</option>
                                                        
                                                        <option value="Ghanaian Languages ">Ghanaian Languages </option>
                                                        
                                                        <option value=" Government "> Government </option>
                                                        
                                                        <option value="  Graphic Design ">  Graphic Design </option>
                                                        
                                                        <option value="GSM Phones Maintenance And Repairs ">GSM Phones Maintenance And Repairs </option>
                                                        
                                                        <option value=" Hausa "> Hausa </option>
                                                        
                                                        <option value="Twi">Twi</option>
                                                        
                                                        <option value="Health Education ">Health Education </option>
                                                        
                                                        <option value=" History "> History </option>
                                                        
                                                        <option value=" Home Management "> Home Management </option>
                                                        
                                                        <option value=" Ibibio "> Ibibio </option>
                                                        
                                                        <option value="  Igbo ">  Igbo </option>
                                                        
                                                        <option value="Information And Communication Technology (Elective">Information And Communication Technology (Elective</option>
                                                        
                                                        <option value="Islamic Studies ">Islamic Studies </option>
                                                        
                                                        <option value="Leather Goods ">Leather Goods </option>
                                                        
                                                        <option value=" Leatherwork "> Leatherwork </option>
                                                        
                                                        <option value="Literature In English ">Literature In English </option>
                                                        
                                                        <option value=" Machine Woodworking "> Machine Woodworking </option>
                                                        
                                                        <option value="Marketing">Marketing</option>
                                                        
                                                        <option value="Metalwork ">Metalwork </option>
                                                        
                                                        <option value="Mining ">Mining </option>
                                                        
                                                        <option value="Office Practice ">Office Practice </option>
                                                        
                                                        <option value="Painting And Decorating ">Painting And Decorating </option>
                                                        
                                                        <option value="Physical Education ">Physical Education </option>
                                                        
                                                        <option value="Physics ">Physics </option>
                                                        
                                                        <option value="Picture Making ">Picture Making </option>
                                                        
                                                        <option value="Printing Craft Practise ">Printing Craft Practise </option>
                                                        
                                                        <option value="Radio, Television And Electronics Works ">Radio, Television And Electronics Works </option>
                                                        
                                                        <option value="Salesmanship">Salesmanship</option>
                                                        
                                                        <option value="Sculpture ">Sculpture </option>
                                                        
                                                        <option value="Shorthand ">Shorthand </option>
                                                        
                                                        <option value="Store Management ">Store Management </option>
                                                        
                                                        <option value="Technical Drawing ">Technical Drawing </option>
                                                        
                                                        <option value=" Textiles "> Textiles </option>
                                                        
                                                        <option value="Tourism">Tourism</option>
                                                        
                                                        <option value=" Upholstery "> Upholstery </option>
                                                        
                                                        <option value="Visual Art ">Visual Art </option>
                                                        
                                                        <option value="Welding And Fabrication Engineering Craft Practice">Welding And Fabrication Engineering Craft Practice</option>
                                                        
                                                        <option value="West African Traditional Religion (W.A.T.R) ">West African Traditional Religion (W.A.T.R) </option>
                                                        
                                                        <option value=" Woodwork "> Woodwork </option>
                                                        
                                                        <option value="Yoruba">Yoruba</option>
                                                        
                                                        <option value="Chemistry">Chemistry</option>
                                                        
                                                        <option value="Management In Living ">Management In Living </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="">
                                                
                                                <div class="form-group">
                                                    
                                                    <div class="col-sm-12">
                                                        <select name="grades[]" size="1" class="form-control">
                                                            <option value="">-- Select grade --</option>
                                                            <option value="A1">A1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B3">B3</option>
                                                            <option value="C4">C4</option>
                                                            <option value="C5">C5</option>
                                                            <option value="C6">C6</option>
                                                            <option value="D7">D7</option>
                                                            <option value="E8">E8</option>
                                                            <option value="F9">F9</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <div class="col-sm-12">
                                                    <select name="third_elective[]" size="1" placeholder="elective course" class="form-control">
                                                        <option value="">-- Select subject --</option>
                                                        <option value="Agricultural Science">Agricultural Science</option>
                                                        
                                                        <option value="Animal Husbandry ">Animal Husbandry </option>
                                                        
                                                        <option value="Auto Body Repairs ">Auto Body Repairs </option>
                                                        
                                                        <option value="Auto Electrical Work ">Auto Electrical Work </option>
                                                        
                                                        <option value="Auto Mechanics">Auto Mechanics</option>
                                                        
                                                        <option value="Auto Mechanical Work">Auto Mechanical Work</option>
                                                        
                                                        <option value="Basic Electronics / Electronics ">Basic Electronics / Electronics </option>
                                                        
                                                        <option value="Basic Electricity / Applied Electricity">Basic Electricity / Applied Electricity</option>
                                                        
                                                        <option value="Biology">Biology</option>
                                                        
                                                        <option value="Auto Parts Merchandising">Auto Parts Merchandising</option>
                                                        
                                                        <option value="Block Laying/Brick Concreting">Block Laying/Brick Concreting</option>
                                                        
                                                        <option value=" Basketry"> Basketry</option>
                                                        
                                                        <option value="Building Construction">Building Construction</option>
                                                        
                                                        <option value="Catering Craft Practice">Catering Craft Practice</option>
                                                        
                                                        <option value="Ceramics">Ceramics</option>
                                                        
                                                        <option value="Christian Religious Studies">Christian Religious Studies</option>
                                                        
                                                        <option value="Civic Education">Civic Education</option>
                                                        
                                                        <option value="Clothing/ Textiles">Clothing/ Textiles</option>
                                                        
                                                        <option value="Commerce">Commerce</option>
                                                        
                                                        <option value="Computer Studies ">Computer Studies </option>
                                                        
                                                        <option value="Cosmetology ">Cosmetology </option>
                                                        
                                                        <option value="Cost Accounting">Cost Accounting</option>
                                                        
                                                        <option value="Crop Husbandry/ Horticulture ">Crop Husbandry/ Horticulture </option>
                                                        
                                                        <option value=" Data Processing "> Data Processing </option>
                                                        
                                                        <option value="Economics ">Economics </option>
                                                        
                                                        <option value="Elective / Further Mathematics ">Elective / Further Mathematics </option>
                                                        
                                                        <option value="Electrical Installation And Maintenance Work">Electrical Installation And Maintenance Work</option>
                                                        
                                                        <option value="Electronics">Electronics</option>
                                                        
                                                        <option value="Arabic ">Arabic </option>
                                                        
                                                        <option value="Financial Accounting ">Financial Accounting </option>
                                                        
                                                        <option value="Fisheries">Fisheries</option>
                                                        
                                                        <option value=" Food And Nutrition "> Food And Nutrition </option>
                                                        
                                                        <option value="Forestry ">Forestry </option>
                                                        
                                                        <option value="French ">French </option>
                                                        
                                                        <option value="Furniture Making ">Furniture Making </option>
                                                        
                                                        <option value="General Knowledge In Art ">General Knowledge In Art </option>
                                                        
                                                        <option value="Geography">Geography</option>
                                                        
                                                        <option value="Ghanaian Languages ">Ghanaian Languages </option>
                                                        
                                                        <option value=" Government "> Government </option>
                                                        
                                                        <option value="  Graphic Design ">  Graphic Design </option>
                                                        
                                                        <option value="GSM Phones Maintenance And Repairs ">GSM Phones Maintenance And Repairs </option>
                                                        
                                                        <option value=" Hausa "> Hausa </option>
                                                        
                                                        <option value="Twi">Twi</option>
                                                        
                                                        <option value="Health Education ">Health Education </option>
                                                        
                                                        <option value=" History "> History </option>
                                                        
                                                        <option value=" Home Management "> Home Management </option>
                                                        
                                                        <option value=" Ibibio "> Ibibio </option>
                                                        
                                                        <option value="  Igbo ">  Igbo </option>
                                                        
                                                        <option value="Information And Communication Technology (Elective">Information And Communication Technology (Elective</option>
                                                        
                                                        <option value="Islamic Studies ">Islamic Studies </option>
                                                        
                                                        <option value="Leather Goods ">Leather Goods </option>
                                                        
                                                        <option value=" Leatherwork "> Leatherwork </option>
                                                        
                                                        <option value="Literature In English ">Literature In English </option>
                                                        
                                                        <option value=" Machine Woodworking "> Machine Woodworking </option>
                                                        
                                                        <option value="Marketing">Marketing</option>
                                                        
                                                        <option value="Metalwork ">Metalwork </option>
                                                        
                                                        <option value="Mining ">Mining </option>
                                                        
                                                        <option value="Office Practice ">Office Practice </option>
                                                        
                                                        <option value="Painting And Decorating ">Painting And Decorating </option>
                                                        
                                                        <option value="Physical Education ">Physical Education </option>
                                                        
                                                        <option value="Physics ">Physics </option>
                                                        
                                                        <option value="Picture Making ">Picture Making </option>
                                                        
                                                        <option value="Printing Craft Practise ">Printing Craft Practise </option>
                                                        
                                                        <option value="Radio, Television And Electronics Works ">Radio, Television And Electronics Works </option>
                                                        
                                                        <option value="Salesmanship">Salesmanship</option>
                                                        
                                                        <option value="Sculpture ">Sculpture </option>
                                                        
                                                        <option value="Shorthand ">Shorthand </option>
                                                        
                                                        <option value="Store Management ">Store Management </option>
                                                        
                                                        <option value="Technical Drawing ">Technical Drawing </option>
                                                        
                                                        <option value=" Textiles "> Textiles </option>
                                                        
                                                        <option value="Tourism">Tourism</option>
                                                        
                                                        <option value=" Upholstery "> Upholstery </option>
                                                        
                                                        <option value="Visual Art ">Visual Art </option>
                                                        
                                                        <option value="Welding And Fabrication Engineering Craft Practice">Welding And Fabrication Engineering Craft Practice</option>
                                                        
                                                        <option value="West African Traditional Religion (W.A.T.R) ">West African Traditional Religion (W.A.T.R) </option>
                                                        
                                                        <option value=" Woodwork "> Woodwork </option>
                                                        
                                                        <option value="Yoruba">Yoruba</option>
                                                        
                                                        <option value="Chemistry">Chemistry</option>
                                                        
                                                        <option value="Management In Living ">Management In Living </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="">
                                                
                                                <div class="form-group">
                                                    
                                                    <div class="col-sm-12">
                                                        <select name="gradess[]" size="1" class="form-control">
                                                            <option value="">-- Select grade --</option>
                                                            <option value="A1">A1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B3">B3</option>
                                                            <option value="C4">C4</option>
                                                            <option value="C5">C5</option>
                                                            <option value="C6">C6</option>
                                                            <option value="D7">D7</option>
                                                            <option value="E8">E8</option>
                                                            <option value="F9">F9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <div class="col-sm-12">
                                                    <select name="fourth_elective[]" size="1" placeholder="elective course" class="form-control">
                                                        <option value="">-- Select subject --</option>
                                                        <option value="Agricultural Science">Agricultural Science</option>
                                                        
                                                        <option value="Animal Husbandry ">Animal Husbandry </option>
                                                        
                                                        <option value="Auto Body Repairs ">Auto Body Repairs </option>
                                                        
                                                        <option value="Auto Electrical Work ">Auto Electrical Work </option>
                                                        
                                                        <option value="Auto Mechanics">Auto Mechanics</option>
                                                        
                                                        <option value="Auto Mechanical Work">Auto Mechanical Work</option>
                                                        
                                                        <option value="Basic Electronics / Electronics ">Basic Electronics / Electronics </option>
                                                        
                                                        <option value="Basic Electricity / Applied Electricity">Basic Electricity / Applied Electricity</option>
                                                        
                                                        <option value="Biology">Biology</option>
                                                        
                                                        <option value="Auto Parts Merchandising">Auto Parts Merchandising</option>
                                                        
                                                        <option value="Block Laying/Brick Concreting">Block Laying/Brick Concreting</option>
                                                        
                                                        <option value=" Basketry"> Basketry</option>
                                                        
                                                        <option value="Building Construction">Building Construction</option>
                                                        
                                                        <option value="Catering Craft Practice">Catering Craft Practice</option>
                                                        
                                                        <option value="Ceramics">Ceramics</option>
                                                        
                                                        <option value="Christian Religious Studies">Christian Religious Studies</option>
                                                        
                                                        <option value="Civic Education">Civic Education</option>
                                                        
                                                        <option value="Clothing/ Textiles">Clothing/ Textiles</option>
                                                        
                                                        <option value="Commerce">Commerce</option>
                                                        
                                                        <option value="Computer Studies ">Computer Studies </option>
                                                        
                                                        <option value="Cosmetology ">Cosmetology </option>
                                                        
                                                        <option value="Cost Accounting">Cost Accounting</option>
                                                        
                                                        <option value="Crop Husbandry/ Horticulture ">Crop Husbandry/ Horticulture </option>
                                                        
                                                        <option value=" Data Processing "> Data Processing </option>
                                                        
                                                        <option value="Economics ">Economics </option>
                                                        
                                                        <option value="Elective / Further Mathematics ">Elective / Further Mathematics </option>
                                                        
                                                        <option value="Electrical Installation And Maintenance Work">Electrical Installation And Maintenance Work</option>
                                                        
                                                        <option value="Electronics">Electronics</option>
                                                        
                                                        <option value="Arabic ">Arabic </option>
                                                        
                                                        <option value="Financial Accounting ">Financial Accounting </option>
                                                        
                                                        <option value="Fisheries">Fisheries</option>
                                                        
                                                        <option value=" Food And Nutrition "> Food And Nutrition </option>
                                                        
                                                        <option value="Forestry ">Forestry </option>
                                                        
                                                        <option value="French ">French </option>
                                                        
                                                        <option value="Furniture Making ">Furniture Making </option>
                                                        
                                                        <option value="General Knowledge In Art ">General Knowledge In Art </option>
                                                        
                                                        <option value="Geography">Geography</option>
                                                        
                                                        <option value="Ghanaian Languages ">Ghanaian Languages </option>
                                                        
                                                        <option value=" Government "> Government </option>
                                                        
                                                        <option value="  Graphic Design ">  Graphic Design </option>
                                                        
                                                        <option value="GSM Phones Maintenance And Repairs ">GSM Phones Maintenance And Repairs </option>
                                                        
                                                        <option value=" Hausa "> Hausa </option>
                                                        
                                                        <option value="Twi">Twi</option>
                                                        
                                                        <option value="Health Education ">Health Education </option>
                                                        
                                                        <option value=" History "> History </option>
                                                        
                                                        <option value=" Home Management "> Home Management </option>
                                                        
                                                        <option value=" Ibibio "> Ibibio </option>
                                                        
                                                        <option value="  Igbo ">  Igbo </option>
                                                        
                                                        <option value="Information And Communication Technology (Elective">Information And Communication Technology (Elective</option>
                                                        
                                                        <option value="Islamic Studies ">Islamic Studies </option>
                                                        
                                                        <option value="Leather Goods ">Leather Goods </option>
                                                        
                                                        <option value=" Leatherwork "> Leatherwork </option>
                                                        
                                                        <option value="Literature In English ">Literature In English </option>
                                                        
                                                        <option value=" Machine Woodworking "> Machine Woodworking </option>
                                                        
                                                        <option value="Marketing">Marketing</option>
                                                        
                                                        <option value="Metalwork ">Metalwork </option>
                                                        
                                                        <option value="Mining ">Mining </option>
                                                        
                                                        <option value="Office Practice ">Office Practice </option>
                                                        
                                                        <option value="Painting And Decorating ">Painting And Decorating </option>
                                                        
                                                        <option value="Physical Education ">Physical Education </option>
                                                        
                                                        <option value="Physics ">Physics </option>
                                                        
                                                        <option value="Picture Making ">Picture Making </option>
                                                        
                                                        <option value="Printing Craft Practise ">Printing Craft Practise </option>
                                                        
                                                        <option value="Radio, Television And Electronics Works ">Radio, Television And Electronics Works </option>
                                                        
                                                        <option value="Salesmanship">Salesmanship</option>
                                                        
                                                        <option value="Sculpture ">Sculpture </option>
                                                        
                                                        <option value="Shorthand ">Shorthand </option>
                                                        
                                                        <option value="Store Management ">Store Management </option>
                                                        
                                                        <option value="Technical Drawing ">Technical Drawing </option>
                                                        
                                                        <option value=" Textiles "> Textiles </option>
                                                        
                                                        <option value="Tourism">Tourism</option>
                                                        
                                                        <option value=" Upholstery "> Upholstery </option>
                                                        
                                                        <option value="Visual Art ">Visual Art </option>
                                                        
                                                        <option value="Welding And Fabrication Engineering Craft Practice">Welding And Fabrication Engineering Craft Practice</option>
                                                        
                                                        <option value="West African Traditional Religion (W.A.T.R) ">West African Traditional Religion (W.A.T.R) </option>
                                                        
                                                        <option value=" Woodwork "> Woodwork </option>
                                                        
                                                        <option value="Yoruba">Yoruba</option>
                                                        
                                                        <option value="Chemistry">Chemistry</option>
                                                        
                                                        <option value="Management In Living ">Management In Living </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="">
                                                
                                                <div class="form-group">
                                                    
                                                    <div class="col-sm-12">
                                                        <select name="gradesss[]" size="1" class="form-control">
                                                            <option value="">-- Select grade --</option>
                                                            <option value="A1">A1</option>
                                                            <option value="B2">B2</option>
                                                            <option value="B3">B3</option>
                                                            <option value="C4">C4</option>
                                                            <option value="C5">C5</option>
                                                            <option value="C6">C6</option>
                                                            <option value="D7">D7</option>
                                                            <option value="E8">E8</option>
                                                            <option value="F9">F9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                            </div>
                        </div>
                    </div>
                        <?php  }
                    } ?>
                    <div class="form-group">
                        <input class="btn btn-primary pull-right" type="submit" id="submit" value="submit">
                    </div>
                </form>
                
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').on('submit', function() {
       $.ajax({
        url: "insert.php",
        method: "POST",
        data: $("#add_course").serialize(),
        success: function (data) {
            alert(data);
            $("#add_course")[0].reset();
        }
       });
    });
    });
</script>