<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BCPC :: BSMRU Computer and Programming Club</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/bcpc.png" rel="icon">
  <link href="assets/img/bcpc.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href=" assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href=" assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href=" assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href=" assets/vendor/swiper/swiper-bundle.min.css " rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href=" assets/css/style.css " rel="stylesheet">

<style>
    #header.transparent-nav {
	/*position:fixed;*/
	background-color: transparent;
	box-shadow: var(--bs-box-shadow);
	/*--*/
	/*height: 100px;*/
}

@media (min-width:994px) {
        #header.transparent-nav .navbar li a {
            color:white;
        }
    }
    @media (max-width : 994px) {
        #header.transparent-nav .navbar li a {
            color:black;
        }
    }
@media(max-width:994px){
    .navbar-toggler-icon {
    /* background-image: $navbar-dark-toggler-icon-bg; */
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }
}
.image-shade:after{
	content:"";
	position:absolute;
	left:0;
	right:0;
	top:0;
	bottom:0;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#374050), to(#798696));
	/* background-image: linear-gradient(to bottom, #374050 0%, #798696 100%); */
	opacity: 0.7;
}

#home .animated {
  animation: up-down 2s ease-in-out infinite alternate-reverse both;
}

.c-item{
    height: calc(100vh);
    width: 100vw;
}

.c-img{
    height: calc(100vh);
    width: auto;
    object-fit: cover;
}



</style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center transparent-nav">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
       
        <!-- Uncomment below if you prefer to use an image logo -->
       <a href="/#home"><img src="assets/img/bcpc-logo2.png" alt="" class="img-fluid img-srolled"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="/#home"><strong>HOME</strong></a></li>
          <li><a class="nav-link scrollto " href="/#portfolio"><strong>EVENTS</strong></a></li>
          <li><a class="nav-link scrollto" href="/#about"><strong>ABOUT</strong></a></li>
          <li><a class="nav-link scrollto" href="/#notices"><strong>NOTICES</strong></a></li>
          <li><a class="nav-link scrollto" href="/#services"><strong>COURSES</strong></a></li>
         
         <strong>
             <li class="dropdown"><a href="#team"><span><strong>PANEL</strong></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="blink"><a href="/panel.php" style="color:green"><strong>Current Panel</strong></a></li>
             

            </ul>
          </li>
        </strong>
          <li><a class="nav-link scrollto" href="/#contact"><strong>CONTACT</strong></a></li>
          <li><a class="getstarted scrollto" href="https://www.facebook.com/bcpc.bsmru"><strong>EXPLORE</strong></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->