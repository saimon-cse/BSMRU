<?php

    $customized_title_state = $_GET['id'];
    include('assets/Partials/headerfile.php');

    if (   !($_GET['id'] >=0 and $_GET['id'] < sizeof($faculty_names))   ) { 
        header("Location: index"); 
        exit; 
    }

?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
		include('assets/Partials/headerfile.php');
        include('assets/Partials/config-profile.php');
        
	?>
    <link rel="stylesheet" href="assets/css/faculty-profile-2.css"/>

</head>

<body>
        

    <!-- Header -->

    <?php 
		$navdesign = 1;
		include('assets/Partials/home-menu.php'); 
	?>
    <!-- /Header -->

    

    <div class="container-fluid" style="height: 100px; border: 1px solid white;"></div>


    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <!--For image and bio-->
            <div class="col-lg-3" id="faculty-image-bio">
                <div id="fixed-sidebar" class="fixed-sidebar">
                    <img src= 
                    <?php
                        $i = $_GET['id'];
                        echo "$faculty_img_links[$i]";
                     ?> >
                    <h3 id="faculty-name"><a href="#">
                        <?php
                            $fac_display_name = $faculty_names[$i];
                            if(  !($faculty_special_duites[$i]=="")  ){
                                $fac_display_name = "".$faculty_names[$i]. $special_duty_style_prefix_profile . $faculty_special_duites[$i] . $special_duty_style_suffix_profile;
                            }
                            echo $fac_display_name; 
                        ?>
                    </a></h3>
                    <p style="font-size: 1.2em;">
                    <?php
                        echo " $faculty_designations[$i]"; 
                    ?>
                    </p>
                    <p>
                        <?php
                        echo "Department of $dept_nick_name"; 
                        ?>
                    </p>
                    <div style="display:flex">
                    <i class="fa-regular fa-envelope"></i>
                    <span>
                    <!-- <p style="font-size: 1.3em;"> -->
                    <?php
                        echo "$faculty_emails[$i]"; 
                     ?>
                    </div>
                    </span>

                    <div style="margin-top: 5px;">
                        <i class="fa-solid fa-mobile"></i>
                        <span>
                        <?php
                        echo "$faculty_phones[$i]"; 
                        ?>
                        </span>
                    </div>
                </div>
            </div> <!--Column-1 ends-->
            
            <!--For Others-->
            <div class="col-lg-9" id="faculty-details">

            <div style="margin-left: 20px; margin-top: 20px">

                <!--nav starts-->
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 30px; ">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" href="#faculty-academic-experience">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" href="#faculty-experience">Experiences</a>
                    </li>
                    <?php
                        if(sizeof($fac_award[$i]) != 0){
                           echo '<li class="nav-item">';
                           echo '<a class="nav-link" id="profile-tab" href="#faculty-awards">Awards</a>';
                           echo '</li>';
                        }
                    ?>

                    <?php
                        if(($fac_researchint[$i]) != 0){
                           echo ' <li class="nav-item">';
                           echo '<a class="nav-link" id="contact-tab" href="#faculty-research-interest">Research Interests</a>';
                           echo '</li>';
                        }
                    ?>

                    <?php
                        if(sizeof($fac_journalpaper[$i]) || sizeof($fac_conferencepaper[$i]) != 0 ){
                           echo ' <li class="nav-item">';
                           echo '<a class="nav-link" href="#faculty-publication">Publications</a>';
                           echo '</li>';
                        }
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
                    <div id="faculty-academic-experience" class="faculty-attributes" style="scroll-margin-top: 110px;">
                    <div style="border-bottom: 1px solid rgb(231, 187, 12);box-shadow: -5px 0px rgb(231, 187, 12); border-radius: 0%; "><h3 style="margin-left:8px;">Education</h3></div>
                        <?php
                        $len = sizeof($fac_degree[$i]);
                        for($j=0; $j<$len; $j++)
                        {
                            echo "<div>";
                            echo "<h4>".$fac_degree[$i][$j]."</h4>";
                            echo "<p>".$fac_institute[$i][$j]."</p>";
                            echo "<p>"."Passing year: ".$fac_passyear[$i][$j]."</p>";
                            echo "</div>";
                            
                        }
                        ?>
                    </div>
                    <!--Academic Career Ends-->

                    
                    
                    <!--Experience-->
                    <div id="faculty-experience" class="faculty-attributes" style="margin-top: 70px; scroll-margin-top: 110px;">
                    <div style="border-bottom: 1px solid rgb(231, 187, 12);box-shadow: -5px 0px rgb(231, 187, 12); border-radius: 0%"><h3 style="margin-left: 8px;">Experiences</h3></div>
                        
                            <table class="table table-striped" style="margin-top: 15px;">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Organization</th>
                                        <th scope="col">From Date</th>
                                        <th scope="col">To Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                     $len = sizeof($fac_exptitle[$i]);
                                     for($j=0; $j<$len; $j++)
                                     {
                                         echo "<tr>";
                                         echo "<td scope='row'>". $fac_exptitle[$i][$j]."</td>";
                                         echo "<td>".$fac_exporgan[$i][$j]."</td>";
                                         echo "<td>".$fac_expfrom[$i][$j]."</td>";
                                         echo "<td>".$fac_expto[$i][$j]."</td>";
                                         echo "</tr>";
                                        }
                                        ?>

                                </tbody>
                            </table>
                    </div>
                    <!--Experience Ends-->


                    
                        <!--Awards-->
                        <?php
                        if(sizeof($fac_award[$i]) != 0){

                            echo '<div id="faculty-awards" class="faculty-attributes" style="margin-top: 70px; scroll-margin-top: 110px;">';
                            echo '<div style="border-bottom: 1px solid rgb(231, 187, 12);box-shadow: -5px 0px rgb(231, 187, 12); border-radius: 0% "><h3 style="margin-left:8px;">Awards</h3></div>';
                            
                                     echo'<table class="table table-striped" style="margin-top: 15px;">';
                                         echo'<thead>';
                                             echo'<tr>';
                                                 echo'<th scope="col">Awards Type</th>';
                                                 echo'<th scope="col">Title</th>';
                                                 echo '<th scope="col">Year</th>';
                                                 echo '<th scope="col">Country</th>';
                                                 echo '<th scope="col">Description</th>
                                             </tr>
                                         </thead>
     
                                         
                                         <tbody>';
                                             
                                            
                                             $len = sizeof($fac_award[$i]);
                                             for($j=0; $j<$len; $j++)
                                                 {
                                                 echo "<tr>";
                                                 echo "<td scope='row'>". $fac_award[$i][$j]."</td>";
                                                 echo "<td>".$fac_awardtitle[$i][$j]."</td>";
                                                 echo "<td>".$fac_awardyear[$i][$j]."</td>";
                                                 echo "<td>".$fac_awardcountry[$i][$j]."</td>";
                                                 echo "<td>".$fac_awarddescription[$i][$j]."</td>";
                                                 echo "</tr>";
                                                 }
                                            
                            
                                    echo ' </tbody>
                                     </table>                               
                             </div>';
                        }

                        ?>

                        <!--Awards-->


                    <!--Research Interest-->
                    <?php
                    if(($fac_researchint[$i]) != 0)
                    {

                        echo '<div id="faculty-research-interest" class="faculty-attributes" style="margin-top: 50px; scroll-margin-top: 110px;">';
                        echo '<div style="border-bottom: 1px solid rgb(231, 187, 12);box-shadow: -5px 0px rgb(231, 187, 12); border-radius: 0% "><h3 style="margin-left:8px;">Research Interests</h3></div>';
                        echo "<hr>";
    
                        echo '<p style="margin-left: 2px;">';
                            
                        echo "$fac_researchint[$i]"; 
                            
                        echo "</p>";
    
                        echo "</div>";
                    }
                    
                    ?>

                    <!--Research Interest Ends-->
                    <br>

                    <!--Publications-->
                    <?php
                    if(sizeof($fac_journalpaper[$i])|| sizeof($fac_conferencepaper[$i])){

                        echo '<div id="faculty-publication" class="faculty-attributes" style=" scroll-margin-top: 110px;">';
                        echo ' <div style="border-bottom: 1px solid rgb(231, 187, 12);border-radius: 0%;box-shadow: -5px 0px rgb(231, 187, 12); "><h3 style="margin-left:8px;">Publications</h3></div>';
                        echo '<br>';
                    }

                    ?>
                        <?php
                            if(sizeof($fac_journalpaper[$i])){

                                echo '<table class="table table-striped">                            
                                    <thead>
                                        <tr rowspan="2">
                                            <th style="color: rgb(62, 62, 180);">Journal Article</td>
                                        </tr>
                                    </thead>';
            
                                    $len = sizeof($fac_journalpaper[$i]);
                                    
                                    if($len != 0){
                                        for($j=0, $num=1; $j<$len; $j++, $num++)
                                        {
                                            echo "<tr>";
                                            echo "<td style='padding: 15px'> $num. ".$fac_journalpaper[$i][$j]."</td>"; 
                                            echo "</tr>";                                 
                                        }
                                    }
                                    echo '</table>';
                            }
                        ?>

                                

                                <!-- Conference paper start -->
                        <!-- <br> -->
                        <?php
                            if(sizeof($fac_conferencepaper[$i])){

                                echo '<table class="table table-striped">                            
                                    <thead>
                                        <tr rowspan="2">
                                            <th style="color: rgb(62, 62, 180);">';                                            
                                            echo 'Conference Proceedings';
                                          echo'</th>
                                        </tr>
                                    </thead>';
                                    $len = sizeof($fac_conferencepaper[$i]);
                                    
                                    if($len != 0){
                                        for($j=0, $num=1; $j<$len; $j++, $num++)
                                        {
                                            echo "<tr>";
                                            echo "<td style='padding: 15px'> $num. ".$fac_conferencepaper[$i][$j]."</td>"; 
                                            echo "</tr>";                                 
                                        }
                                    }
                                    echo '</table>';
                            }
                        echo '</div>';
                        ?>
                        

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