<?php
    include('assets/Partials/db.php');
    $id = $_GET['questionno'];
        
    $q_title = "";
    $q_year_sem = "";
    $q_type = "";
    $q_session = "";
    $q_year = "";
    $q_file = "";

    if(!is_numeric($id)){
        header("Location: questionbank"); 
        exit;
    }

    $sql = "SELECT * FROM question_banks WHERE id = " . $id;
    $res = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($res) < 1){
        header("Location: questionbank"); 
        exit;
    }
    while($row = mysqli_fetch_assoc($res)){
        $q_title = $row['title'];
        $q_year_sem = $row['year'] . " " . $row['semester'];
        $q_type = $row['type'];
        $q_session = $row['session'];
        $q_year = $row['exam_year'];
        $q_file = $row['file'];
    }

    if($q_title==""){
        $q_title = "N/A";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
        include('assets/Partials/headerfile.php');
    ?>
    <link rel="stylesheet" href="assets/css/question.css">
    
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
                        <h2 class="notice-title">'.$q_title.'</h2>
                        <h4>'.$q_year_sem.'</h4>
                        <p class="notice-date"><i class="far fa-calendar-alt"></i><span>Exam year: '.$q_year.'</span></p>
                        <p class="notice-type"><i class="fas fa-tag"></i><span>'.$q_type.'</span></p>
                        <div class="notice-description">
                            <p>Session: '. $q_session.'</p>
                        </div>
                        <div class="download-link">
                            <a href="assets/Files/questions/'.$q_file.'" class="btn btn-primary" download>
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