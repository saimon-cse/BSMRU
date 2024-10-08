<?php 

	function navbar_section($conn, $navdesign){
		
		if($navdesign==0){
			echo '<header id="header" class="transparent-nav" style="position: fixed; height: 100px;">';
		}
		else{
			echo '<header id="header" class="bg-light" style="position: fixed; height: 100px; background-color: white;">';
		}

		echo '
			<div class="container" id="navbar-wrap">

				<div class="navbar-header">

					<div class="navbar-brand">
						<a class="logo" href="https://bsmru.ac.bd/" target="_blank">
							<img src="assets/img/bsmru_logo.png" alt="logo">
						</a>
					</div>


					<button class="navbar-toggle">
						<span></span>
					</button>
				</div>

				<nav id="nav" style="margin-top: 20px;">
					
					<ul class="main-menu nav navbar-nav navbar-right" style="display: inline-block; max-width: 70vw; margin-right: -70px;">
		';

		$sql1 = "SELECT * FROM menu ORDER BY rank";
		$res1 = mysqli_query($conn, $sql1);
		
		while($row1 = mysqli_fetch_assoc($res1)){
			$menu_id = $row1['menu_id'];
			$sql2 = "SELECT * FROM dropdown_1 WHERE menu_id = " .$menu_id. " ORDER BY rank";
			
			$res2 = mysqli_query($conn, $sql2);
			$dropdown_size = mysqli_num_rows($res2);

			if($dropdown_size==0){
				echo '<li><a style="padding-bottom: 0px; padding-top: 10px;" href="'.$row1['link'].'">'.$row1['title'].'</a></li>';
				continue;
			}
			
			echo '<li class="dropdown" id="dropdown-list"><a style="padding-bottom: 0px; padding-top: 10px;" href="'.$row1['link'].'">'.$row1['title'].'</a>
					<ul class="drop-list">';

			while($row2 = mysqli_fetch_assoc($res2)){
				$dropdown_id = $row2['dropdown_id'];
				$sql3 = "SELECT * FROM deepdropdown WHERE dropdown_id = " . $dropdown_id . " ORDER BY rank";
				$res3 = mysqli_query($conn, $sql3);
				$deepdropdown_size = mysqli_num_rows($res3);

				if($deepdropdown_size == 0){
					echo '<li><a href="'.$row2['link'].'">'.$row2['title'].'</a></li>';
					continue;
				}

				echo '<li class="dropdown" id="dropdown-list"><a href="'.$row2['link'].'">'.$row2['title'].'</a>
						<ul class="drop-list">';
				while($row3 = mysqli_fetch_assoc($res3)){
					echo '<li><a href="'.$row3['link'].'">'.$row3['title'].'</a></li>';
				}
				echo '</ul></li>';
			}

			echo '</ul></li>';
		}

		echo '
								</ul>

				</nav>

			</div>
		</header>
		';
	}

	
?>