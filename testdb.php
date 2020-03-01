<?php
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
		$email='palak.savlia@somaiya.edu';
		$select="SELECT * FROM users WHERE Email='$email'";
		$result=mysqli_query($conn,$select);

		if(mysqli_num_rows($result)) {
			while($row=mysqli_fetch_assoc($result)) {
				$name=$row['Username'];
				echo $name.' ';
				echo $IP.'\n';
			}
		} else {
			echo "errors";
			echo mysqli_error($conn);
		}
	}
	mysqli_close($conn);

?>
