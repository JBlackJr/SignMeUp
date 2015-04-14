<?php
include 'core/init.php';
if (empty($_POST) === false){
	$required_fields = array('firstname', 'lastname', 'username', 'email', 'password', 'password_again');
	foreach($_POST as $key=>$value){
		 if(empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'All fields must be completed and valid';
			break 1;  //breaks out of the foreach loop and continue execution
		 }
	}
	//When I get this transferred over to the new webpage, 
	// use an alert or a popover from bootstrape JS section
	
	if(empty($errors) === true){
		#does the user exist already?
		if(user_exists($_POST['username']) === true){
			$errors[] = 'Sorry, that username is already taken.';
		}
		if(preg_match("/\\s/", $_POST['username']) == true){
			$errors[] = 'Your Username cannot contain any spaces.';
		}
		
		if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 100){
			$errors[] = 'Your password must be between <b>six</b> and <b>100</b> characters';
		}
		
		if($_POST['password'] !== $_POST['password_again']){
			$errors[] = 'Your passwords do not match.';
		}
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
			$errors[] = 'A valid email address is required.';
		}
		if(email_exists($_POST['email']) === true){
			$errors[] = 'Sorry, that email is already our system.';
		}
	}
}
?>
<!--Jumbotron / Sign up-->
<div class="jumbotron">
  <h1>Note it Down!</h1>
  <p>This site is still a <strong>WIP</strong></br>
		<br/>
		<p>The CSCI-3500 book: <a href="https://drive.google.com/file/d/0B6iMM79qRzcbM201WEpSdTFmbkE/edit?usp=sharing"/>Click here for Virus!... Book!</a></p>
		<p>The CSCI-4417 Not UNIX book: <a href="https://drive.google.com/file/d/0B6iMM79qRzcbdVhienJsYmFyTjA/edit?usp=sharing"/>Click for the Book!</a> </br>
		The CSCI-4417 Ubuntu book:  <a href="https://drive.google.com/folderview?id=0B6iMM79qRzcbQ1JKcThReXdFdHM&usp=sharing"/> Click Me!</a></p>
  </p>
  <p><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalSignUp">Sign up!</button></p>
  <?php 
		//part11 register user part 2 4:00min
  
		if(empty($_POST) === false && empty($errors) === true){
			$register_data = array(
				'Username'		=> $_POST['username'],
				'Password'		=> $_POST['password'],
				'First_Name'	=> $_POST['firstname'],
				'Last_Name'		=> $_POST['lastname'],
				'Email'			=> $_POST['email']
			);
			
			register_user($register_data);
			header('Location: includes/widgets/signup.php?success');
			exit();
			
		} else if(empty($errors) === false){
			echo output_errors($errors);
		}
	?>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="modalSignUpLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Sign up..</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="#" method="post">
		
		
		  <div class="form-group">
			<label for="inputFName" class="col-sm-3 control-label">First Name</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" name="firstname" id="inputFName" placeholder="First Name">
			</div>
		  </div>
		  
		  
		   <div class="form-group">
			<label for="inputLName" class="col-sm-3 control-label">Last Name</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" name="lastname" id="inputLName" placeholder="Last Name">
			</div>
		  </div>
		  
		  
		   <div class="form-group">
				<label for="inputUName" class="col-sm-3 control-label">Username</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="username" id="inputUName" placeholder="Username">
				</div>
		  </div>
		  
		  
		  <div class="form-group">
			<label for="inputEmail" class="col-sm-3 control-label">Email</label>
			<div class="col-sm-8">
			  <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
			</div>
		  </div>
		  
		  
		  <div class="form-group">
			<label for="inputPassword" class="col-sm-3 control-label">Password</label>
			<div class="col-sm-8">
			  <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
			</div>
			</div>
			
			<div class="form-group">
			   <label for="inputPasswordMatch" class="col-sm-3 control-label">Password</label>
			     <div class="col-sm-8">
			       <input type="password" class="form-control" name="password_again" id="inputPasswordMatch" placeholder="Password Again">
			     </div>
		    </div>
			
		    <div class="form-group">
				<div class="col-sm-offset-3 col-sm-8">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  <button type="submit" class="btn btn-primary">Submit!</button>
				</div>
		    </div>
		</form>
      </div>
    </div>
  </div>
</div>