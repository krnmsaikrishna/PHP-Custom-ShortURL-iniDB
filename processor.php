<?php
$url = $_POST['url'];
$user_pattern = $_POST['userstr'];
If($url!="")
{
	$check = preg_match("/^[a-zA-Z0-9]+$/",$user_pattern);
	$unique_pattern="";
	if($check==1 && strlen($user_pattern)>=5)
	{
	$unique_pattern = $user_pattern;
} else {
	$combs = "023456789bcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXYZ";
	$x = 0;
	$pattern ='';

	while ($x<5) {
		$pattern .= substr($combs,mt_rand(0,strlen( $combs)-1),1);
		$x++;
    }
	$unique_pattern=$pattern;
}

	$file = file_get_contents("redirects.ini");
if(strpos($file,$unique_pattern)==FALSE) {

	$test = "notfound"; 
	$report = "<font id='tag'>Your Short url is: </font><font id='line'>http://saxna.tk/$unique_pattern</font>";

} else {

	$report = "<font id='tagline'>This Short url already exist. Please try again to get new one.</font>";
	$test="found";

}

	$links=fopen("redirects.ini","a");
	$newlink="\n".$unique_pattern."=".$url;
	$txt= fopen("linksstatus.txt","a");
	$text="\n".$unique_pattern." 0";
	fwrite($txt,$text);
	fclose($txt);
	if($test=="notfound") {
	fwrite($links,$newlink);
   }
	fclose($links);
	header("Location: http://saxna.tk/shortner.php?url=$url&userstr=$unique_pattern&report=$report");
	exit();
} else {
	header("Location: http://saxna.tk/shortner");
	exit();
}
?>