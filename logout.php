<?php
$IP=file_get_contents("http://ipecho.net/plain");
session_start();
unset($_SESSION["display_name"]);
header("Location: http://$IP/multichain-web-demo/index.php");
?>
