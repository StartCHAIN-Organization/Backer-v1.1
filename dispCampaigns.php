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
//        if(!isset($_SESSION['display_name']){
  //              header("location: login.php");
    //    }
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


?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MultiChain Demo</title>
		<link rel="stylesheet" href="main.css">
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
			.disp-campaign-btn{
				border-radius:25px;
				background-color:#459FFF;
			}
			.disp-campaign-btn:hover{
				background-color:#459FFF;
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
                </script>
	</head>
	<body>
		<header id="header">
			<div class="inner">
				<a href="./?chain=<?php echo htmlspecialchars($chain)?>" class="logo2">StartCHAIN</a>
				<nav id="nav">
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>">Home</a>
					<!-- <a href="./createSample.php?chain=<?php echo htmlspecialchars($chain)?>&page=createSample">Create Campaign</a> -->
					<a href="createCampaign.php?chain=<?php echo htmlspecialchars($chain) ?>">Create Campaign</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=send">Fund Campaign</a>
					<a href="#">How it Works</a>
					<?php if(isset($_SESSION["display_name"])) { ?>
					<a href="logout.php"><?php if($_SESSION["display_name"]){ echo $display_name;} else {echo Login;}?></a>
					<?php } else { ?>
					<a href="login.php">Login</a><?php }?>
				</nav>
			</div>
		</header>
		<!-- Two -->
			<section id="two">
				<div class="inner">
				<?php
					$count = 0;
					if(mysqli_num_rows($result)){
					    while($row=mysqli_fetch_assoc($result)){
						$campaignID=$row['CampaignID'];
				                $name=$row['ProTitle'];
						$descpBrief=$row['DescpBrief'];
				?>
					<article>
						<div class="content">
							<header>
								<center><h3><?php echo $name?>  </h3></center>
							</header>
							<div class="image fit">
								<img src="crowdfunding.png" alt="" />
							</div>
     						<!--	<p>Cumsan mollis eros. Pellentesque a diam sit amet mi magna ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet lorem ipsum feugiat tempus.</p>-->
							<p><?php echo wordwrap($descpBrief,53,"<br>",TRUE); ?></p>
							<center><button class="disp-campaign-btn"><a href=<?php echo "campaignDetails.php?campaignId=".$campaignID?>  style="color:#fff; text-decoration:none">Click here for Details</a></button></center>
						</div>
					</article>

				<?php
//						$count = $count + 1;
						}
				} else{
					echo "error";
				}

				?>
				</div>
			</section>
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
