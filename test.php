
<?php
	require_once 'functions.php';
	$config=read_config();
	$chain=@$_GET['chain'];

	if (strlen($chain))
		$name=@$config[$chain]['name'];
	else
		$name='';

	set_multichain_chain($config[$chain]);
	echo $name;
$PublicAddress='asfdas';

/*        if (no_displayed_error_result($getaddress, multichain('getaddress', true))){
	        $PublicAddress=$getaddress['address'];
  	}*/
if (no_displayed_error_result($getaddresses, multichain('getaddresses', true))) {

		foreach ($getaddresses as $getaddress) {
			$PublicAddress = $getaddress['address'];
		}
}

echo $PublicAddress;


?>

