
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $customized_title_state = -1;
      include('assets/Partials/headerfile.php');
    ?>

</head>

<body>



    <!-- Header -->

    <?php
      $navdesign = 1;
      include('assets/Partials/home-menu.php');
    ?>
    <!-- /Header -->

    <div class="container-fluid" style="height: 100px; border: solid;">

        <!--Dept name-->
    </div>
    <div class="container-fluid dept-name box-shadow">
        <h2>Department of <?php echo "$dept_full_name"?></h2>
    </div>
    <!--End Dept-->

    <div class="container">
        <div class="head"style="margin-top: 40px"><h2 style="text-align:center;"><b>List of Courses (Year/Semester)</b></h2><hr></div>

          <div class="row">
              <div class="col">
                  <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">First Year (Semester-I)</div><br>
                  <table class="table table-hover border border-dark">
                      
                          <thead>
                            <tr>
                              
                              <th scope="col"style="background-color:gray;">Course Code</th>
                              <th scope="col"style="background-color:gray;">Course Title</th>
                              <th scope="col"style="background-color:gray;">Credits</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            <?php
                              $len = sizeof($course_codes_11);
                              for($i=0; $i<$len; $i++){
                                echo
                                "
                                  <tr>
                                    <td>$course_codes_11[$i]</td>
                                    <td>$course_titles_11[$i]</td>
                                    <td>$course_credits_11[$i]</td>
                                  </tr>
                                ";
                              }
                            ?>
                            
                          </tbody>
                    </table>
                    
                     <h5><?php echo "Total Credit: : $credit_11"?></h5>
              </div>
              <div class="col">
                  <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">First Year (Semester-II)</div><br>
          <table class="table table-hover border border-dark">
              
                  <thead style="background-color: gray">
                    <tr>
                      
                      <th scope="col"style="background-color:gray;">Course Code</th>
                      <th scope="col"style="background-color:gray;">Course Title</th>
                      <th scope="col"style="background-color:gray;">Credits</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                              $len = sizeof($course_codes_12);
                              for($i=0; $i<$len; $i++){
                                echo
                                "
                                  <tr>
                                    <td>$course_codes_12[$i]</td>
                                    <td>$course_titles_12[$i]</td>
                                    <td>$course_credits_12[$i]</td>
                                  </tr>
                                ";
                              }
                            ?>
                    
                  </tbody>
                  
              
            </table><h5><?php echo "Total Credit: : $credit_12"?></h5>
              </div>
              </div>
      </class=>
            </div><br><br>
            <div class="container">
              <div class="row">
                  <div class="col">
                      <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">Second  Year (Semester-I)</div><br>
              <table class="table table-hover border border-dark">
                  
                      <thead style="background-color: gray">
                        <tr>
                          
                          <th scope="col"style="background-color:gray;">Course Code</th>
                          <th scope="col"style="background-color:gray;">Course Title</th>
                          <th scope="col"style="background-color:gray;">Credits</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                              $len = sizeof($course_codes_21);
                              for($i=0; $i<$len; $i++){
                                echo
                                "
                                  <tr>
                                    <td>$course_codes_21[$i]</td>
                                    <td>$course_titles_21[$i]</td>
                                    <td>$course_credits_21[$i]</td>
                                  </tr>
                                ";
                              }
                            ?>
                        
                      </tbody>
                  
                </table>
                <h5><?php echo "Total Credit: : $credit_21"?></h5>
                  </div>
                  <div class="col">
                      <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">Second Year (Semester-II)</div><br>
              <table class="table table-hover border border-dark">
                  
                      <thead style="background-color: gray">
                        <tr>
                          
                          <th scope="col"style="background-color:gray;">Course Code</th>
                          <th scope="col"style="background-color:gray;">Course Title</th>
                          <th scope="col"style="background-color:gray;">Credits</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                              $len = sizeof($course_codes_22);
                              for($i=0; $i<$len; $i++){
                                echo
                                "
                                  <tr>
                                    <td>$course_codes_22[$i]</td>
                                    <td>$course_titles_22[$i]</td>
                                    <td>$course_credits_22[$i]</td>
                                  </tr>
                                ";
                              }
                            ?>
                        
                      </tbody>
                  
                </table>
                <h5><?php echo "Total Credit: : $credit_22"?></h5>
                  </div>
                </div>
          </div>
            </div><br><br>
            <div class="container">
              <div class="row">
                  <div class="col">
                      <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">Third Year (Semester-I)</div><br>
              <table class="table table-hover border border-dark">
                  
                      <thead style="background-color: gray">
                        <tr>
                          
                          <th scope="col"style="background-color:gray;">Course Code</th>
                          <th scope="col"style="background-color:gray;">Course Title</th>
                          <th scope="col"style="background-color:gray;">Credits</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                              $len = sizeof($course_codes_31);
                              for($i=0; $i<$len; $i++){
                                echo
                                "
                                  <tr>
                                    <td>$course_codes_31[$i]</td>
                                    <td>$course_titles_31[$i]</td>
                                    <td>$course_credits_31[$i]</td>
                                  </tr>
                                ";
                              }
                            ?>
                        
                      </tbody>
                  
                </table>
                <h5><?php echo "Total Credit: : $credit_31"?></h5>
                  </div>
                  <div class="col">
                      <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">Third Year (Semester-II)</div><br>
              <table class="table table-hover border border-dark">
                  
                      <thead style="background-color: gray">
                        <tr>
                          
                          <th scope="col"style="background-color:gray;">Course Code</th>
                          <th scope="col"style="background-color:gray;">Course Title</th>
                          <th scope="col"style="background-color:gray;">Credits</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                              $len = sizeof($course_codes_32);
                              for($i=0; $i<$len; $i++){
                                echo
                                "
                                  <tr>
                                    <td>$course_codes_32[$i]</td>
                                    <td>$course_titles_32[$i]</td>
                                    <td>$course_credits_32[$i]</td>
                                  </tr>
                                ";
                              }
                            ?>
                        
                      </tbody>
                  
                </table>
                <h5><?php echo "Total Credit: : $credit_32"?></h5>
                  </div>
                </div>
          </div>
            </div><br><br>
            <div class="container">
              <div class="row">
                  <div class="col">
                      <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">Fourth Year (Semester-I)</div><br>
              <table class="table table-hover border border-dark">
                  
                      <thead style="background-color: gray">
                        <tr>
                          
                          <th scope="col"style="background-color:gray;">Course Code</th>
                          <th scope="col"style="background-color:gray;">Course Title</th>
                          <th scope="col"style="background-color:gray;">Credits</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                              $len = sizeof($course_codes_41);
                              for($i=0; $i<$len; $i++){
                                echo
                                "
                                  <tr>
                                    <td>$course_codes_41[$i]</td>
                                    <td>$course_titles_41[$i]</td>
                                    <td>$course_credits_41[$i]</td>
                                  </tr>
                                ";
                              }
                            ?>
                        
                      </tbody>
                  
                </table>
                <h5><?php echo "Total Credit: : $credit_41"?></h5>
                  </div>
                  <div class="col">
                      <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">Fourth Year (Semester-II)</div><br>
              <table class="table table-hover border border-dark">
                  
                      <thead style="background-color: gray">
                        <tr>
                          
                          <th scope="col"style="background-color:gray;">Course Code</th>
                          <th scope="col"style="background-color:gray;">Course Title</th>
                          <th scope="col"style="background-color:gray;">Credits</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                              $len = sizeof($course_codes_42);
                              for($i=0; $i<$len; $i++){
                                echo
                                "
                                  <tr>
                                    <td>$course_codes_42[$i]</td>
                                    <td>$course_titles_42[$i]</td>
                                    <td>$course_credits_42[$i]</td>
                                  </tr>
                                ";
                              }
                            ?>
                       
                        
                      </tbody>
                  
                </table>
                <h5><?php echo "Total Credit: : $credit_42"?></h5>
                  </div>
                </div>
          </div>
            </div><br><br>
            <div class="container">
              <div class="row">
                  <div class="col">
                      <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">List of Optional I and II Courses</div><br>
                      <table class="table table-hover border border-dark">
                  
                          <thead style="background-color: gray">
                            <tr>
                              
                              <th scope="col"style="background-color:gray;">Course Code</th>
                              <th scope="col"style="background-color:gray;">Course Title</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              
                              <td>CSE 4105</td>
                              <td>Computer Graphics</td>
                              
                            </tr>
                            <tr>
                              
                              <td>CSE 4107</td>
                              <td>Introduction to Data Science</td>
                              
                            </tr>
                            <tr>
                              
                              <td>CSE 4109</td>
                              <td>Introduction to Data Mining and Warehousing</td>
                              
                            </tr>
                            <tr>
                              
                              <td>CSE 4111</td>
                              <td>Advanced Algorithms</td>
                             
                            </tr>
                            <tr>
                              
                              <td>CSE 4113</td>
                              <td>Bioinformatics</td>
                              
                            </tr>
                            <tr>
                              
                              <td>CSE 4115</td>
                              <td>Information Retrieval</td>
                             
                            </tr>
                            <tr>
                              
                              <td>CSE 4117</td>
                              <td>Graph Theory</td>
                              
                            </tr>
                            <tr>
                              
                              <td>CSE 4119</td>
                              <td>Human Computer Interaction</td>
                              
                            </tr>
                            <tr>
                              
                              <td>CSE 4121</td>
                              <td>Wareless Networks</td>
                              
                            </tr>
                           
                            
                          </tbody>
                      
                    </table><br><br><br><br>
                  </div>
                  <div class="col">
                      
        <div class="table-title"style="text-align:center;font-size:30px;background-color:rgba(245, 40, 145, 0.03);color:black;">List of Optional III and IV Courses</div><br>
        <table class="table table-hover border border-dark">
                  
          <thead style="background-color: gray">
            <tr>
              
              <th scope="col"style="background-color:gray;">Course Code</th>
              <th scope="col"style="background-color:gray;">Course Title</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              
              <td>CSE 4205</td>
              <td>Computer Vision and Image Processing</td>
              
            </tr>
            <tr>
              
              <td>CSE 4207</td>
              <td>VLSI Design</td>
              
            </tr>
            <tr>
              
              <td>CSE 4209</td>
              <td>Natural Language Processing</td>
              
            </tr>
            <tr>
              
              <td>CSE 4211</td>
              <td>Computer Ethics</td>
             
            </tr>
            <tr>
              
              <td>CSE 4213</td>
              <td>Simulation and Modeling</td>
              
            </tr>
            <tr>
              
              <td>CSE 4215</td>
              <td>Digital Signal Processing</td>
             
            </tr>
            <tr>
              
              <td>CSE 4217</td>
              <td>Introduction to Robotics</td>
              
            </tr>
            <tr>
              
              <td>CSE 4219</td>
              <td>Communication Systems</td>
              
            </tr>
            <tr>
              
              <td>CSE 4221</td>
              <td>Parallel and Distributed Systems</td>
              
            </tr>
           
            
          </tbody>
      
    </table>
                  </div>
                </div>
                
          </div>
          
          </div>
          
        </div>
                <!--End Faculty-->
            </div>


        </div>
    </div>
    

    <div style="height: 30px;"></div>
    



    <!--Footer-->
    <?php
      include('assets/Partials/footer.php');
    ?>







    <!-- JS Files-->

    <?php
      include('assets/Partials/footerfile.php');
    ?>

    
</body>

</html>