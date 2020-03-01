<?php
	session_start();
	$username="root";
	$password="pass";
	$host="34.238.50.242";
	$dbname="StartCHAIN";
	$IP=file_get_contents("http://ipecho.net/plain");

	$conn=mysqli_connect($host,$username,$password,$dbname);

	if(!$conn) {
//		echo "Error";
		echo mysqli_connect_error();
	} else {
//		echo mysqli_get_host_info($conn)
		$Email=$_POST['email'];
		$Password=$_POST['password'];
//		echo $Email;
		$select="SELECT * FROM users WHERE Email='$Email'";

		$result=mysqli_query($conn,$select);

		if(mysqli_num_rows($result)) {
			while($row=mysqli_fetch_assoc($result)) {
				$name=$row['Username'];
				$checkPass=$row['Password'];
				if(strcmp(md5($Password),$checkPass) == 0) {
					$_SESSION['display_name']=$name;
					header("Location: http://$IP/multichain-web-demo/index.php");
				}
			}
		} else {
			echo "errors";
			echo mysqli_error($conn);
		}
	}
	mysqli_close($conn);

?>
