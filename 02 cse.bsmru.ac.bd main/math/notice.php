<?php
    include('assets/Partials/db.php');
    $id = $_GET['notice'];
        
    $n_date = "";
    $n_title = "";
    $n_des = "";
    $n_file = "";
    $n_type = "";

    if(!is_numeric($id)){
        header("Location: allnotices"); 
        exit;
    }

    $sql = "SELECT * FROM notices WHERE id = " . $id;
    $res = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($res) < 1){
        header("Location: allnotices"); 
        exit;
    }
    while($row = mysqli_fetch_assoc($res)){
        $n_title = $row['not_title'];
        $n_des = $row['not_des'];
        $n_file = $row['not_file'];
        $n_type = $row['not_type'];

        $date = new DateTime($row['not_date']);
        $n_date = $date->format('d M Y');
    }

    if($n_title==""){
        $n_title = "N/A";
    }

    if($n_des==""){
        $n_des = "N/A";
    }

    if($n_date == ""){
        $n_date = "N/A";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
        include('assets/Partials/headerfile.php');
    ?>
    <link rel="stylesheet" href="assets/css/notice.css">
    
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
    <div class="container notice-container" >
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="notice-title">'.$n_title.'</h2>
                        <p class="notice-date"><i class="far fa-calendar-alt"></i><span>'.$n_date.'</span></p>
                        <p class="notice-type"><i class="fas fa-tag"></i><span>'.$n_type.'</span></p>
                        <div class="notice-description">
                            <p>'. $n_des.'</p>
                        </div>
                        <div class="download-link">
                            <a href="assets/Files/'.$n_file.'" class="btn btn-primary" download>
                                <i class="fas fa-download"></i> Download Attachment
                            </a>
                        </div>
                    </div>
                </div>
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