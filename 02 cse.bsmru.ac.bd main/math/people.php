<?php
    include('assets/Partials/db.php');
    $id = $_GET['category'];

    if(!is_numeric($id)){
        header("Location: people?category=1"); 
        exit;
    }
    
    if($id<1 OR $id>2){
        header("Location: people?category=1"); 
        exit;
    }

    $title = "Faculty Members";

    if($id == 2){
        $title = "Officers and Staff";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
        include('assets/Partials/headerfile.php');
        include('assets/Views/peopleview.php');
    ?>
    <link rel="stylesheet" href="assets/css/people.css">
    
</head>

<body>



    <!-- Header -->

    <?php 
		$navdesign = 1;
        include('assets/Partials/home-menu.php'); 
        navbar_section($conn, $navdesign);
	?>
    <!-- /Header -->


    <div class="container-fluid" style="height: 100px; border: solid white;">   
    </div>

    <!--Dept name-->
    <?php
        deptName($dept_full_name);
    ?>
    <!--End Dept-->



    <!--Faculty List-->
    <div id="faculty-list"> 
        <div class="container" style="margin-top: 10px;">
            <!-- row -->
            <div class="row">
                <div class="section-header">
                    <h2 class="people-heading"><?php echo $title;?></h2>
                </div>
            </div>
            <!-- /row -->

            <?php
                if($id==1){
                    peopleSection($conn, "Teacher");
                }
                else if($id==2){
                    peopleSection($conn, "Staff");
                }        
            ?>

        </div>
    </div>


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