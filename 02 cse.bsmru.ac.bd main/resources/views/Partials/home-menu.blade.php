<?php 
	include('menu-items.php');
	if($navdesign==0){
		echo "<header id=\"header\" class=\"transparent-nav\" style=\"position: fixed; height: 100px;\">";
	}
	else{
		echo "<header id=\"header\" class=\"bg-light\" style=\"position: fixed; height: 100px; background-color: white;\">";
	}
?>




		<div class="container" id="navbar-wrap">

			<div class="navbar-header">
				<!-- Logo -->
				<div class="navbar-brand">
					<a class="logo" href="https://bsmru.ac.bd/" target="_blank">
						<img src="assets/img/bsmru_logo.png" alt="logo">
					</a>
				</div>

				<!-- /Logo -->

				<!-- Mobile toggle -->
				<button class="navbar-toggle">
					<span></span>
				</button>
				<!-- /Mobile toggle -->
			</div>

			<!-- Navigation -->
			<nav id="nav" style="margin-top: 20px;">
				
				<!--List Items-->
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="main-menu nav navbar-nav navbar-right me-auto mb-2 mb-lg-0  my-nav" style="display: inline-block;">
					<?php
						$length = sizeof($menu);
						
						$dropdowncount = 0;
						for($i=0; $i<$length; $i++)
						{
							if($dropdownindex[$i]==0){
								echo "<li><a href=$menulinks[$i]>$menu[$i]</a></li>";
								continue;								
							}

							//Dropdown items
							
							$html = "<li class=\"dropdown\" id=\"dropdown-list\"><a href=\"$menulinks[$i]\"><span>$menu[$i]</span> <i class=\"bi bi-chevron-down\"></i></a>
							<ul class=\"drop-list\">";
							

							$count = $deepdropdownsize[$dropdowncount];
							for($j=0; $j<$count; $j++){
								$html = $html."<li><a href=\"".$deepdropdownlinks[$dropdowncount][$j]."\">".$deepdropdowns[$dropdowncount][$j]."</a></li>";
							}
							$dropdowncount++;
							$html=$html."</ul></li>";
							
							echo $html;
						}
					?>
				</ul>
				<!--End List Items-->
			</div>
			</nav>
			<!-- /Navigation -->

		</div>
	</header>