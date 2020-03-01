<?php
        require_once 'functions.php';
        $config=read_config();
        $chain=@$_GET['chain'];

        if (strlen($chain))
                $name=@$config[$chain]['name'];
        else
                $name='';

        set_multichain_chain($config[$chain]);
	$PublicAddress='';

	if (no_displayed_error_result($getaddresses, multichain('getaddresses', true))) {

                foreach ($getaddresses as $getaddress) {
                        $PublicAddress = $getaddress['address'];
                }
	}

	echo $PublicAddress;
	$username="root";
	$password="pass";
	$host="34.238.50.242";
	$dbname="StartCHAIN";
	$IP=file_get_contents("http://ipecho.net/plain");

	$conn=mysqli_connect($host,$username,$password,$dbname);
//	mysql_select_db($dbname);

	if($conn->connect_error) {
		echo "Error";
	}

	$ID=$_POST['UID'];
	$Username=$_POST['username'];
	$Email=$_POST['email'];
	$Password=$_POST['password'];
	$hashed_password = md5($Password);
	$Usertype=$_POST['usertype'];

//	echo "$ID,  $Username, $Email, $Password, $Usertype";
	$insert="INSERT INTO users VALUES('$ID','$Username','$Email','$hashed_password','$Usertype','$PublicAddress')";

	$result=mysqli_query($conn,$insert);

	if($result) {
//		echo "$hashed_password";
		header("Location: http://$IP/multichain-web-demo/login.php");
	} else {
		echo "error";
	}

	mysqli_close($conn);
?>
