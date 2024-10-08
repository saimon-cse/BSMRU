<?php
    $customized_title_state = $_GET['people'];
    include('assets/Partials/db.php');
    include('assets/Views/profileview.php');

    checkId($conn, $_GET['people']);
    $id = $_GET['people'];
    $uid = findUserId($conn, $id);
    
?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include('assets/Partials/headerfile.php');
    ?>
    <link rel="stylesheet" href="assets/css/faculty-profile-2.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-D4YfGC9hVHKi0qKe1bR0g8hDkJ3Nw1z1i5XJ7/JgqjO2HNGf0h1O5noh0Y3p8QU3Gc7Qww7CKXNzQw//ihvSxQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        $active = 0;
        $educationsize = rowCount($conn, "educations", $uid, "");
        $generalexperiencesize = rowCount($conn, "experiences", $uid, "");
        $professionaexperiencesize = rowCount($conn, "other_experiences", $uid, "");
        $awardsize = rowCount($conn, "awards", $uid, "");
        $researchinterestsize = researchInterestCount($conn, $uid);
        $researchprofilesize = rowCount($conn, "research_profiles", $uid, "");
        $publicationsize = rowCount($conn, "publications", $uid, "");

        $experiencesize = $generalexperiencesize + $professionaexperiencesize;
        $researchsize = $researchinterestsize + $researchprofilesize;
    ?>


    <div class="container abs-position">
        <div class="row top-left-border">
            <!--For image and bio-->
            <div class="col-lg-3 left-column" id="faculty-image-bio">
                <?php peopleImageBio($conn, $id, "Teacher"); ?>
            </div>
            
            <!--For Others-->
            <div class="col-lg-9" id="faculty-details">

            <div style="margin-left: 20px; margin-top: 20px">

                <!--nav starts-->
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 30px; ">
                    <?php 
                        $active = navigationTab($conn, $educationsize, $experiencesize,  $awardsize, $researchsize, $publicationsize);
                        ///echo $active;
                    ?>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
                </div>
                <!--nav ends-->

            </div>

            <div class="tab-content" id="nav-tabContent" style="margin-left: 20px;">

                <!--Academic Career-->
                <?php academicExperience($conn, $uid, $educationsize); ?>
                <!--Academic Career Ends-->

                
                
                <!--Experience-->
                <?php   experience($conn, $uid, $generalexperiencesize, $professionaexperiencesize, $active); ?>
                <!--Experience Ends-->


                
                <!--Award-->
                <?php award($conn, $uid, $awardsize,  $active);?>
                <!--Award Ends-->


                <!--Research-->
                <?php research($conn, $uid, $researchinterestsize, $researchprofilesize, $active); ?>

                <!--Research Interest Ends-->
                <br>

                <!--Publications-->
                <?php publication($conn, $uid, $publicationsize, $active);?>
                    

            <!-- Conference paper end -->

                <!--Publication Ends-->


            </div> <!--Tab contents end-->

        </div> <!--Column-2 ends-->

        </div><!--Row ends-->
    </div><!--Container-entire-->






    <div style="height: 50px;">

    </div>









    <script>
        $('#myTab a[href="#profile"]').tab('show') // Select tab by name
        $('#myTab li:first-child a').tab('show') // Select first tab
        $('#myTab li:last-child a').tab('show') // Select last tab
        $('#myTab li:nth-child(3) a').tab('show') // Select third tab
    </script>


    <!--Include footer files-->
	<?php include('assets/Partials/footerfile.php')?>


</body>

</html>