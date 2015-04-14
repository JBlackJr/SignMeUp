<?php
include 'core/init.php';

if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'You need to enter a valid username and password';
	}  else if (user_exists($username) === false){
		$errors[] = 'We can\'t find that Username. Have you signed up?';
	}  else if (user_active($username) === false){
		$errors[] = 'You haven\'t activated your account!';
	}
	else{
		
//		if(strlen($password) > 100) {
//			$errors[] = 'That Password is too long';
//		}
		$login = login($username, $password);
		if($login === false) {
			$errors[] = 'That Username/Password combination is incorrect';
		} else { 
			$_SESSION['user_id'] = $login;
			$username = $_POST['username'];
			header('Location: index.php');
			exit();
			}
			
			
		//$current_user = user($user_id);
		//echo $current_user;
		//if(!$current_user) {
		//	$errors[] = 'You done messed up meow son';
		//} else {
		//	$_POST['username'] = $current_user;
		//	header('Location: index.php');
		//	exit();
		//}
	}
} else {
	$errors[] = 'No data detected';
	}
//include 'includes/overall/over_header.php';
//include 'includes/overall/over_footer.php';
?>

