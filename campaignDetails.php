<?php

	require_once 'functions.php';

	$config=read_config();
	$chain=@$_GET['chain'];
         if(isset($chain)){
	  output_success_text('Chain is Set');
	}
	else{
	   output_success_text('Chain is not set');

	}

	if (strlen($chain))
		$name=@$config[$chain]['name'];
	else
		$name='';

      set_multichain_chain($config[$chain]);
	$campaignId=$_GET['campaignId'];


	$username="root";
	$password="pass";
	$host="34.238.50.242";
	$dbname="StartCHAIN";

	$conn=mysqli_connect($host,$username,$password,$dbname);

	if($conn->connect_error){
		echo "Error";
	}


	$select= "SELECT * FROM campaign WHERE CampaignID='$campaignId' ";
	$result= mysqli_query($conn, $select);
	
	if(mysqli_num_rows($result)){
	    while($row=mysqli_fetch_assoc($result)){
		$Name=$row['Name'];
		$OrgName=$row['OrgName'];
		$Email=$row['Email'];
		$ProTitle=$row['ProTitle'];
		$FundAmt=$row['FundAmt'];
		$Milestone=$row['Milestone'];
		$Time=$row['Time'];
		$DescpBrief=$row['DescpBrief'];
		$DescpDetail=$row['DescpDetail'];




?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MultiChain Demo</title>
		<link rel="stylesheet" href="campaign.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
		#footer{
			background-color:#212121;
			height: 60px;
			bottom:0px;
			left:0px;
			line-height:50px;
			color:#aaa;
			text-align:center;
			width:100%;
		}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
		<header id="header">
			<div class="inner">
				<a href="./?chain=<?php echo htmlspecialchars($chain)?>" class="logo2">StartCHAIN</a>
				<nav id="nav">
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>">Home</a>
				<!--	<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=createSample">Create Campaign</a> -->

					<a href="createCampaign.php?chain=<?php echo htmlspecialchars($chain)?>">Create Campaign</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=send">Fund Campaign</a>
					<a href="myProfile.php?chain=<?php echo htmlspecialchars($chain)?>">My Profile</a>
					<a href="#">Register/Login</a>
				</nav>
			</div>
		</header>
<?php 
echo ' 
		<div class="container" id="margin">
		                <form name="myform" class="form-group" action="#"  method="post">
					<div class="ui">
							<h1><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i>Campaign Details</h1>
				 		<div class="row">
							<div class="col-md-5">
				 				<div class="container">
							 		<div class="InputWithIcon">
							 		<label for="inputname ">Name</label>
							 		<input type="text" name="name" class="form-control" value='.$Name.' readonly>
							 		<span>
											<i class="fa fa-user icon" aria-hidden="true"></i>
									</span>
							 		</div>
							 		<div class="InputWithIcon">
							 		<label for="input name">Organization name</label>
							 		<span>
							 		<i class="fa fa-building" aria-hidden="true"></i>
							 		</span>
							 		<input type="text" name="org_name" class="form-control"  value='.$OrgName.' readonly>
									</div>
									<div class="InputWithIcon">
							 		<label for="input name">Email</label>
							 		<span>
							 		<i class="fa fa-envelope" aria-hidden="true"></i>
							 		</span>
							 		<input type="email" name="email" class="form-control"  value='.$Email.' readonly>
									</div>
									<div class="InputWithIcon">
							 		<label for="input name">Project Title</label>
							 		<span>
							 		<i class="fa fa-pencil" aria-hidden="true"></i>
							 		</span>
							 		<input type="text" name="pro_title" class="form-control" name="key" value='.$ProTitle.' readonly>
									</div>
									<div class="InputWithIcon">
							 		<label for="input name">Fund required</label>
							 		<span>
							 		<i class="fa fa-money" aria-hidden="true"></i>
							 		</span>
							 		<input type="text" name="fund" class="form-control"  value='.$FundAmt.' readonly>
									</div>
									
									<div class="InputWithIcon">
							 		<label for="input name">Milestone</label>
							 		<span>
							 		<i class="fa fa-money" aria-hidden="true"></i>
							 		</span>
							 		<input type="text" name="milestone"  class="form-control"  value='.$Milestone.' readonly>
									</div>
									<div class="InputWithIcon">
							 		<label for="input name">Time Period</label>
							 		<input type="text" name="time" value='.$Time.' class="form-control" readonly >
									</div>
				 				</div>
				 			</div>
				 				<div class="col-md-7">
							 		 <div class="InputWithIcon">
							 		 <label for="input name">Campaign Brief Description</label>
							 		 <textarea class="form-control" name="descp_brief" rows=6  readonly>'.$DescpBrief.'</textarea>
							 		</div>
							 		 <div class="InputWithIcon">
							 		 <label for="input name">Project Detail Description</label>
							 		 <textarea class="form-control" name="text" rows=14  readonly>'.$DescpDetail.'</textarea>
							 		</div>
				 				</div>
				 				<div class="col-md-12 btn-style">
				 					<input type="submit" name="publish" class="btn btn-primary " value="Fund '.$ProTitle.' ">
				 				</div>
						</div>
				 	</div>
				</form>
		</div>
 ';

}}
?>



	  <footer  class="footer-distributed">
	        <div class="footer-left">
			<h3>Company<span>Logo</span></h3>
			<p class="footer-company-name">Company Name @ 2020</p>
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
			       <p><a href="mailto:support@company.com">support@comapny.com</a></p>
			</div>

 		</div>
		<div class="footer-right">
			<p class="footer-company-about">
			<span>About the Company</span>
			Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet. </p>
			
			<div class="footer-icons">

			   <a href="#"><i class="fa fa-facebook"></i></a>
			   <a href="#"><i class="fa fa-twitter"></i></a>
			   <a href="#"><i class="fa fa-github"></i></a>
			</div>
		</div>
          </footer>
	</body>

 </html>
