<?php
    include('assets/Partials/db.php');
    $id = $_GET['syllabus'];
        
    $s_year = "";
    $s_title = "";
    $s_file = "";

    if(!is_numeric($id)){
        header("Location: allsyllabus"); 
        exit;
    }

    $sql = "SELECT * FROM syllabus WHERE id = " . $id;
    $res = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($res) < 1){
        header("Location: allsyllabus"); 
        exit;
    }
    while($row = mysqli_fetch_assoc($res)){
        $s_title = $row['title'];
        $s_year = $row['year'];
        $s_file = $row['file'];
    }

    if($s_title==""){
        $s_title = "N/A";
    }

    if($s_year==""){
        $s_year = "N/A";
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
    <div class="container notice-container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="notice-title">'.$s_title.'</h2>
                        <p class="notice-date"><i class="far fa-calendar-alt"></i><span>'.$s_year.'</span></p>
                        <div class="download-link">
                            <a href="assets/Files/Syllabus/'.$s_file.'" class="btn btn-primary" download>
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