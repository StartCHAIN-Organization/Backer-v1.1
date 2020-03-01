<?php
	require_once 'functions.php';

	$config=read_config();
	$chain=@$_GET['chain'];

	if (strlen($chain))
		$name=@$config[$chain]['name'];
	else
		$name='';

	set_multichain_chain($config[$chain]);

	$IP=file_get_contents("http://ipecho.net/plain");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MultiChain Demo</title>

		<base href=<?php echo "http://$IP/multichain-web-demo/"?>>
		<link rel="stylesheet" href="login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			#header .logo2 {
			display: inline-block;
			height: inherit;
                        left: 0;
                        line-height: inherit;
                        margin: 0;
			padding: 0;
			position: absolute;
			top: 0;
                        color: #e5474b;
                        font-size: 1.75em;
			text-transform: none;
			font-weight: bold;
			padding: 0;
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script>
		function generateID() {
			var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			var nums = "0123456789";
			var userID="";
			for (var i = 2; i > 0; --i)
				userID += chars[Math.round(Math.random() * (chars.length - 1))];
			for (var i = 4; i > 0; --i)
				userID += nums[Math.round(Math.random() * (nums.length - 1))];
			document.getElementById("userID").value = userID;
		}
		function isPasswordMatch() {
   			var password = $("#Password").val();
			var confirmPassword = $("#ConfirmPassword").val();

		    	if (password != confirmPassword) {
				$('#register-btn').prop('disabled',true);
				$("#divCheckPassword").html("Passwords do not match!");
			}
			else {
				$("#divCheckPassword").html("");
				$('#register.btn').prop('disabled', false);
			}
		}

		$(document).ready(function () {
			$('#register-btn').prop('disabled',true);
	        	$("#ConfirmPassword").keyup(isPasswordMatch);
		});
		</script>
	</head>
	<body>
		<header id="header">
			<div class="inner">
				<a href="./" class="logo2">StartCHAIN</a>
				<nav id="nav">
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>">Home</a>

					<a href="createCampaign.php?chain=<?php echo htmlspecialchars($chain)?>">Create Campaign</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=send">Fund Campaign</a>
					<a href="myProfile.php?chain=<?php echo htmlspecialchars($chain)?>">My Profile</a>
					<a href="#">Login</a>
				</nav>
			</div>
		</header>

		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="registerdb.php?chain=<?php echo htmlspecialchars($chain)?>" method="post">
					<span class="login100-form-title" style="font-style: roboto;">
						<h2><b>Register</b></h2>
					</span>

					<input type="hidden" name="UID" id="userID">

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                                <input class="input100" type="text" name="username" placeholder="Username">
                                                <span class="focus-input100"></span>
                                                <span class="symbol-input100">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                </span>
                                        </div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id ="Password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
                                                <input class="input100" type="password" name="confirmPassword" id="ConfirmPassword" placeholder="Confirm Password" onChange="isPasswordMatch();">
						<span class="focus-input100"></span>
                                                <span class="symbol-input100">
                                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                                </span>
					</div>
					<div>
						<center><p id="divCheckPassword"></p></center>
					</div>
					<br>
					<div class="wrap-input100 validate-input">
						&emsp; &emsp; <input type="radio" name="usertype" value="Backer" style=""> Backer
						&emsp; &emsp; &emsp; &ensp; &ensp;
                                                <input type="radio" name="usertype" value="Founder"> Founder
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="register" id="register-btn" value="register" class="login100-form-btn" onclick="generateID();">
					</div>

					<div class="text-center p-t-75 p-b-15">
						<a class="txt2" href="login.php">
							Already have an account?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	</body>
</html>
