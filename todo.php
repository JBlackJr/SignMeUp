<?php
require_once("todo.php");
	define("FILE","data.csv");
	$file = fopen("FILE", 'r');
	if($file === false){
		die("Could not open file");
	}
	
header("Content-Type: text/html; charset=utf-8");

$currentdate = new DateTime('now',"l, F j, Y");


?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>Lee McFee's Todo List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		<div class="container">
			<h1>Welcome!</h1>
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-info">
					  <!-- Default panel contents -->
					  <div class="panel-heading">Lee McFee's ToDo List</div>
						<table class="table table-bordered">
							<tr>
								<th>Item</th>
								<th>Priority</th>
								<th>Due Date</th>
							</tr>
							<?php
								$todo = array();
								while(($file = file('data.csv') !== FALSE ))
								{
									foreach($file as $line){
										list($item[0],$priority[1],$date[2]) = explode(",", $line);
									}
								}
								//if($date < $currentdate)
								//	ECHO "<tr class=\"warning\">";
									
								// <tr>
								//	<tdtd>
								//	<td></td>
								//	<td></td>
								// </tr>
							?>
							<tr>
								<td><?= $todo->getName();?></td>
								<td><?= $todo->getPriority();?></td>
								<td><?= $todo->getDate();?></td>
							</tr>
							<tr>
								<td><?= $todo->getName();?></td>
								<td><?= $todo->getPriority();?></td>
								<td><?= $todo->getDate();?></td>
							</tr>
							<tr>
								<td><?= $todo->getName();?></td>
								<td><?= $todo->getPriority();?></td>
								<td><?= $todo->getDate();?></td>
							</tr>
							<tr>
								<td><?= $todo->getName();?></td>
								<td><?= $todo->getPriority();?></td>
								<td><?= $todo->getDate();?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-info">
					  <!-- Default panel contents -->
					  <div class="panel-heading">
						<h4>Welcome back,</h4>
					  </div>
						<div class="panel-body">
							<p>Lee McFee</p>
							<p><?php print_r($currentdate);?></p>
						</div>
				</div>
					<h2>Key</h2>
					<div class="panel panel-info">
					  <!-- Default panel contents -->
					  <div class="panel-heading">Priorities</div>
						<div class="panel-body">
							<ol>
								<li>High</li>
								<li>Medium</li>
								<li>Low</li>
							</ol>
							<p>Due today: <strong>bold</strong><br/>Overdue: Underlined </p>
						</div>
					</div>
				</div>
			</div>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
?>