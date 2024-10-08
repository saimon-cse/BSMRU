<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $customized_title_state = -1;
		include('assets/Partials/db.php');
		include('assets/Partials/headerfile.php');
	?>
    <link rel="stylesheet" href="assets/css/about.css">
    
    
</head>
<body>

	<!-- Header -->
	<?php 
		$navdesign = 1;
        include('assets/Partials/home-menu.php'); 
        navbar_section($conn, $navdesign);
	?>
	<!-- /Header -->

    <?php
        $sql = "SELECT image FROM carousels ORDER BY rank";
        $result = $conn->query($sql);

        $images = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $images[] = "assets/img/".$row["image"];
            }
        }
    ?>


    <div class="container-fluid" style="height: 100px; border: solid white;"></div>

    <!--Watermark-->
    
    <!--Watermark ends-->

    <!--Dept name-->
    <?php
        deptName($dept_full_name);
    ?>
    <!--End Dept-->
	

    <div class="container" style="margin-top: 30px; margin-bottom: 30px; ">
        <div class="content">
            <div id="about" class="carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner">
                    <?php
                        $active = "active";
                        foreach ($images as $image) {
                            echo '<div class="carousel-item ' . $active . '">';
                            echo '<img src="' . $image . '" class="d-block w-100" alt="...">';
                            echo '</div>';
                            $active = "";
                        }
                    ?>
                    <!-- Add more carousel items as needed -->
                </div>
                <a class="carousel-control-prev" href="javascript:void(0)" type="button" data-target="#about" data-slide="prev">
                    <img src="assets/img/icons/previous1.svg" alt="Previous">
                    </a>
                <a class="carousel-control-next" href="javascript:void(0)" type="button" data-target="#about" data-slide="next">
                    <img src="assets/img/icons/next1.svg" alt="Next">
                </a>
            </div>
            
            <div style="text-align: justify">
                <?php echo $about;?>
            </div>


        </div>
    </div>




	<!--Footer Starts-->
	<?php 
		include('assets/Views/footer.php');
		footerSection($conn, $phone, $email, $address);
	?>
	<!--Footer Starts-->




	<!--Include footer files-->

	<?php include('assets/Partials/footerfile.php');?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>


