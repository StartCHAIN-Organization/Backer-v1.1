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
					<a href="register.php?chain=<?php echo htmlspecialchars($chain)?>">Register</a>
				</nav>
			</div>
		</header>

		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="logindb.php" method="post">
					<span class="login100-form-title" style="font-style: roboto;">
						<h2><b>Login</b></h2>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="login" value="Login" class="login100-form-btn">
					</div>

					<div class="text-center p-t-75 p-b-15">
						<a class="txt2" href="register.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<footer class="footer-distributed">
	   <div class="footer-left">
		<h3>Company <span>Logo</span></h3>
		<p class="footer-company-name"> Company Name @ 2020</p>
	   </div>
	    <div class="footer-center">
		<div>
			<i class="fa fa-map-marker"></i>
			<p><span>444 S. Cedros Ave</span>Solana Beach, California</p>
		</div>
		<div>
			<i class="fa fa-phone"></i>
			<p>+1.555.555.5555</p>
	        </div>
		<div>
		        <i class="fa fa-envelope"></i>
			<p><a href="mailto:support@company.com">support@company.com</a></p>
		</div>
	   </div>
	   <div class="footer-right">		
		<p class="footer-company-about">
		<span>About the Company </span>
		Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis  velit,eu auctor lacus
		vehicula sit amet. </p>

		<div class="footer-icons">
		   <a href="#"><i class="fa fa-facebook"></i></a>
		   <a href="#"><i class="fa fa-twitter"></i></a>
                   <a href="#"><i class="fa fa-github"></i></a>
		</div>

	    </div>
          
       <footer>
  </body>

</html>
