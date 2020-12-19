<?php
$unique_pattern = $_POST['uniquepattern'];
$unique_pattern = str_replace("http://saxna.tk/","",$unique_pattern);
	$file = fopen("linksstatus.txt","r");
	while(! feof($file))
	{
		$strs = fgets($file);
		$strs = explode(" ",$strs);
	if($strs[0]==$unique_pattern)
	{
		$count = $strs[1];
		$count = (int)$count; 
		$url = "http://saxna.tk/shortner.php?uniquepattern=".$unique_pattern."&count=".$count;
		header("Location: ".$url);
		exit();
	}
}
fclose($file);
?>