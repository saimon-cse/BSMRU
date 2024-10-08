<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
        include('assets/Partials/db.php');
        include('assets/Partials/headerfile.php');
        include('assets/Views/allnoticesview.php');
    ?>
    <link rel="stylesheet" href="assets/css/allnotices.css">
    
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
              <h2 class="people-heading">   Notice  Board   </h2>
          </div>
        </div>
    </div>
    <!-- Title Ends -->

    
    <!--Table Starts-->
    <?php
      allNotice($conn);
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