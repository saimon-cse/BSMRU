<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!--Favicon-->

<link rel="icon" type="image/x-icon" href="assets/img/bsmru_logo.png">
<?php
    include('assets/Views/commonmethods.php');
    $dept_short_name = "";
    $dept_full_name = "";
    $about = "";
    $phone = "";
    $email = "";
    $address = "";
    $special_event = "";
    $sqlquery = "SELECT * FROM dept_attributes";
    $resquery = mysqli_query($conn, $sqlquery);

    while($rowquery = mysqli_fetch_assoc($resquery)){
        $dept_short_name = $rowquery['dept_short_name'];
        $dept_full_name = $rowquery['dept_name'];
        $about = $rowquery['about'];
        $phone = $rowquery['phone'];
        $email = $rowquery['email'];
        $address = $rowquery['address']; 
        $special_event = $rowquery['special_event'];
    }

    if($customized_title_state==-1){
        echo "<title>BSMRU $dept_short_name</title>";
    }
    else{
        $namequery = "";
        $sqlquery = "SELECT name FROM users WHERE id = ". $customized_title_state;
        $resquery = mysqli_query($conn, $sqlquery);
        while($rowquery = mysqli_fetch_assoc($resquery)){
            $namequery = $rowquery['name'];
            echo "<title>". $namequery . "</title>";
        }
        $customized_title_state = -1;  
    }
?>



<!--Bootstrap 5 CDN-->


<!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
-->
<link type="text/css" rel="stylesheet" href="assets/Bootstrap/bootstrap.min.css" />
<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css" />

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="assets/css/style.css?version=0"/>

