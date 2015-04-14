<?php 
		if(logged_in() === true) {
			echo 'I am in aside.php logged in is true';
		} else{
			include 'includes/widgets/signup.php';
		}
	?>