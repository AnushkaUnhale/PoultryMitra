<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>LogIn</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
    <center>
	<?php
			include "dbcon.php";
			if (isset($_POST['submit'])){	
			$name = trim($con, $_POST['username']);
			$pass = trim($con, $_POST['password']);
			//$name=$_REQUEST['username'];
			//$pass=$_REQUEST['password'];

			$sql="SELECT * FROM 'signup' WHERE username='$name' AND password='$pass'";
			$con->query($sql);

			$result = $con->query($sql);
			if(mysqli_query($con, $sql)){
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						// Step 4: Generate HTML output
						/*echo "ID: " . $row["id"] . "<br>";
						echo "Name: " . $row["name"] . "<br>";
						echo "Email: " . $row["email"] . "<br>";
						echo "Society: " . $row["society"] . "<br>";
						echo "Address: " . $row["address"] . "<br>";
						echo "Flat no: " . $row["flat"] . "<br>";*/

						// Add more echo statements for other columns or customize the output as needed
						echo "<hr>"; // Optional separator between records

						?>
							<script>
								alert("Login Successful");
							</script>
						<?php
					}
				} else {
					echo "Please check once, Try Again";
				}
			}
			else{
				echo "ERROR: Hush! Sorry $sql.".mysqli_error($con);
			}
		}
			mysqli_close($con);
		?>
	</center>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Login</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="index.html" method="post">
					<input class="text" type="text" name="username" placeholder="Username" required="">
                    <br>
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<br>
					<div class="wthree-text">
						<!--<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>-->
						<div class="clear"> </div>
					</div>
					<div class=" text-center">
						<a href="index.php">
                        	<button type="submit" name="submit" class="btn btn-success">LOGIN</button>
							<br>
							<!--<a href="index.php" class="btn btn-success" type="submit">LOGIN</a>-->
						</a>
                    </div> 
				</form>
				<br>
				<p>Don't have an Account? <a href="signup.php"> REGISTER!</a></p>
			</div>
		</div>
		<!-- //copyright -->
	<div class="main-w3layouts wrapper">
		<h1>LogIn</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="index.html" method="post">
					<input class="text" type="text" name="Username" placeholder="Username" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<div class="wthree-text">
						
						<div class="clear"> </div>
					</div>
					<input type="submit" value="LOGIN">
				</form>
				<p>Don't have an Account? <a href="signup.php"> Signup !</a></p>
			</div>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>