<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!--Favicon-->

<link rel="icon" type="image/x-icon" href="assets/img/bsmru_logo.png">
@include('Partials.config')



@if ($customized_title_state!=-1)
    @if(  !($customized_title_state >= 0 && $customized_title_state < sizeof($faculty_names)) )
        {{$customized_title_state = -1;}}
    @endif
@endif


@if($customized_title_state==-1)
    <title>BSMRU {{$dept_nick_name}}</title>
@else
    <title>{{ $faculty_names[$customized_title_state]}}</title>
@endif



<!--Bootstrap 5 CDN-->


<!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
-->
<link type="text/css" rel="stylesheet" href="assets/vendor/Bootstrap/bootstrap.min.css" />
<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css" />

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="assets/css/style.css?version=1"/>
<script src="https://kit.fontawesome.com/933522e130.js" crossorigin="anonymous"></script>

<style>

        .my-nav{
            @media(max-height:1000px){
                font: size 20em;
            }
        }

</style>
