<?php

	require_once 'functions.php';

	$config=read_config();
	$chain=@$_GET['chain'];

	if (strlen($chain))
		$name=@$config[$chain]['name'];
	else
		$name='';

	set_multichain_chain($config[$chain]);
	session_start();
        $display_name=$_SESSION['display_name'];

	$username="root";
	$password="pass";
	$host="34.238.50.242";
	$dbname="StartCHAIN";
	$conn=mysqli_connect($host,$username,$password,$dbname);

	if($conn->connect_error){
		echo "Error";
	}

	$select="SELECT * FROM campaign ORDER BY campaign.CampaignID DESC LIMIT 2 ";
	$result=mysqli_query($conn,$select);

	$IP=file_get_contents("http://ipecho.net/plain");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MultiChain Demo</title>

		<base href=<?php echo "http://$IP/multichain-web-demo/"?>>

		<link rel="stylesheet" href="main.css">
<!--		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="styles.css">-->
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
		<script type="text/javascript">
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
		function redirect() {
			var x = new XMLHttpRequest();
			x.open("GET","login.php",true);
			x.send();
			//$.get("login.php");
			return false;
		}
                </script>
	</head>
	<body>
		<header id="header">
			<div class="inner">
				<a href="./?chain=<?php echo htmlspecialchars($chain)?>" class="logo2">StartCHAIN</a>
				<nav id="nav">
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>">Home</a>
					<a href="createCampaign.php?chain=<?php echo htmlspecialchars($chain) ?>">Create Campaign</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=send">Fund Campaign</a>
					<a href="myProfile.php?chain=<?php echo htmlspecialchars($chain)?>">My Profile</a>
					<?php if(isset($_SESSION["display_name"])) { ?>
					<a href="logout.php"><?php if($_SESSION["display_name"]){ echo $display_name;} else {echo Login;}?></a>
					<?php } else { ?>
					<a href="login.php">Login</a><?php }?>
				</nav>
			</div>
		</header>


		<div class="container">
			<h1><a href="./">MultiChain Demo</a><?php if (strlen($name)) { ?> &ndash; <?php echo html($name)?><?php } ?></h1>
<?php
	if (strlen($chain)) {
		$name=@$config[$chain]['name'];
?>
<?php
		switch (@$_GET['page']) {
			case 'label':
			case 'permissions':
			case 'issue':
			case 'update':
			case 'send':
			case 'offer':
			case 'accept':
			case 'create':
			case 'publish':
			case 'view':
			case 'txfilter':
			case 'streamfilter':
			case 'approve':
			case 'asset-file':
				require_once 'page-'.$_GET['page'].'.php';
				break;

			default:
				require_once 'page-default.php';
				break;
		}

	} else {
?>
			<p class="lead"><br/>Choose an available node to get started:</p>

			<p>
<?php
		foreach ($config as $chain => $rpc)
			if (isset($rpc['rpchost']))
				echo '<p class="lead"><a href="./?chain='.html($chain).'">'.html($rpc['name']).'</a><br/>';
?>
			</p>
<?php
	}
?>
		</div>
		<!-- Footer -->
	<footer class="footer-distributed">

		   <div class="footer-left">
			<h3>Company<span>Logo</span></h3>
			<p class="footer-company-name">Company Name @ 2020</p>
		    </div>
		    <div class="footer-center">

			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>444 S.Cedros  Ave</span>Solana Beach, California.</p>
			</div>
			<div>
			        <i class="fa fa-phone"></i>
				<p>+1.555.555.5555</p>

			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="mailto:support@company.com"></a></p>
		        </div>
		</div>
		<div class="footer-right">

			<p class="footer-company-about">
			<span>About the company</span>
			Lorem ipsum dolor sit amet, consectateur adispicing elit. Fuse euismod convallis velit, eu auctor lacus vehicula
			sit amet.</p>
			<div class="footer-icons">

				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>
               </div>
          </footer>

	</body>
</html>
