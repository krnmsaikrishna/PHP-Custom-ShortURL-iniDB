<?php
$redirectad = file_get_contents("redirectad.html");
$hyperlinks = parse_ini_file('redirects.ini');
$unique_pattern = $_GET['uniqueid'];
if(isset($_GET['uniqueid']) && array_key_exists($_GET['uniqueid'], $hyperlinks))
{ 
	$file = file_get_contents("linksstatus.txt");
	$lines = explode("\n",$file);

	for($x=0;$x<sizeof($lines);$x++)
	{
		$strs = $lines[$x];
		$strs = explode(" ",$strs);

		if($strs[0]==$unique_pattern)
		{
			$count = $strs[1];
			$count = (int)$count;
			$count = $count+1;
			$lines[$x] = $unique_pattern." ".$count; 
		}
	}

	$str = implode("\n",$lines);
	file_put_contents($file,$str);
	fclose($file);

	$url = $hyperlinks[$_GET['uniqueid']];
    echo $redirectad;
	header("Refresh:5; url=$url");
	exit();
} else {
	echo $redirectad;
	header("Refresh:5; url=http://saxna.tk");
	exit();
}
?>