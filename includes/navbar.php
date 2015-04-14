<li class="active"><a href="http://www.leemcfee.com">Home</a></li>
			<?php 
				if(logged_in() === true) {
					include 'includes/navbar_user.php';
				} else{
					//echo 'are you a student? Go study';
					include 'includes/navbar_global.php';}
			?>

