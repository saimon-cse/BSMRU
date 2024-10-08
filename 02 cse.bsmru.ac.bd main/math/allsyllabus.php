<?php
    include('assets/Partials/db.php');
    $id = $_GET['deg'];

    if(!is_numeric($id)){
        header("Location: allsyllabus?deg=1"); 
        exit;
    }
    
    if($id<1 OR $id>3){
        header("Location: allsyllabus?deg=1"); 
        exit;
    }

    $sql = "SELECT * FROM syllabus WHERE degree_id = " . $id;
    $res = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($res);

    $program = "Bachelor";

    if($id == 2){
        $program = "Masters";
    }

    if($id == 3){
        $program = "Doctoral";
    }
?> 



<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
        include('assets/Partials/headerfile.php');
        include('assets/Views/syllabusview.php');
    ?>
    <link rel="stylesheet" href="assets/css/syllabus.css">
    
</head>

<body>

    <?php 
		  $navdesign = 1;
          include('assets/Partials/home-menu.php'); 
          navbar_section($conn, $navdesign);
	  ?>
    <!-- /Header -->


    <div class="container-fluid" style="height: 100px; border: solid white;"></div>

    <!--Watermark-->
    
    <!--Watermark ends-->

    <!--Dept name-->
    <?php
        deptName($dept_full_name);
    ?>
    <!--End Dept-->


    <!-- Title Starts-->
    <div class="container section-header" id="title-container">
        <div class = "row">
          <div class = "col-md-12" style = "text-align: center">
              <h2 class="people-heading">   <?php echo "  Syllabus of ". $program . " Program  "?></h2>
          </div>
        </div>
    </div>
    <!-- Title Ends -->

    
    <!--Table Starts-->
    <?php
      allsyllabus($conn, $id);
    ?>


    <div style="height: 30px;"></div>


   <!--Footer Starts-->
	<?php 
		include('assets/Views/footer.php');
		footerSection($conn, $phone, $email, $address);
	?>
	<!--Footer Starts-->



    <!--Include footer files-->
	<?php include('assets/Partials/footerfile.php')?>
    
</body>

</html>