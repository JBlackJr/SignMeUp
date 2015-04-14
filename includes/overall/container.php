<?php
	include 'core/init.php';
	
	if(logged_in === true) {
		include 'calender.php';
	} else {
		include 'includes/widgets/signup.php';
	}
?>