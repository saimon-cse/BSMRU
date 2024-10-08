<?php
    include('assets/Partials/db.php');
    $id = $_GET['event'];
        
    $e_date = "";
    $e_title = "";
    $e_des = "";
    $e_file = "";

    if(!is_numeric($id)){
        header("Location: allevents"); 
        exit;
    }

    $sql = "SELECT * FROM events WHERE id = " . $id;
    $res = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($res) < 1){
        header("Location: allevents"); 
        exit;
    }
    while($row = mysqli_fetch_assoc($res)){
        $e_title = $row['title'];
        $e_des = $row['description'];
        $e_file = $row['file'];
        

        $date = new DateTime($row['date']);
        $e_date = $date->format('d M Y');
    }

    if($e_title==""){
        $e_title = "N/A";
    }

    if($e_date == ""){
        $e_date = "N/A";
    }
?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
        include('assets/Partials/headerfile.php');
    ?>
    <link rel="stylesheet" href="assets/css/event.css">
    
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

    <?php
        
    ?>

    <!--Dept name-->
    <?php
        deptName($dept_full_name);
    ?>
    <!--End Dept-->



    


    <?php
    echo '
        <div class="container">
            <div class="row event-section">
                <div class="col-md-5 event-image">
                <a href = "assets/img/Events/'.$e_file.'" target = "_blank"><img src="assets/img/Events/'.$e_file.'" alt="Event Image" class="img-fluid"></a>
                </div>
                <div class="col-md-7 event-content">
                <div class="event-title" style="text-align: justify;">'.$e_title.'</div>
                <div class="event-date"><i class="far fa-clock"></i>'.$e_date.'</div>
                <div class="event-description" style="text-align: justify;">'.$e_des.'</div>
                </div>
            </div>
        </div>
    ';
    ?>











    <div style="height: 100px;"></div>


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