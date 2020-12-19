<html>
<head>

<script type="text/javascript">

function url_check()
{
	var url,test1,test2;
	url = document.shortner.url.value;
	test1 = /(http:|https:)\/\/[A-Za-z0-9\.-]{3,}\.[A-Za-z]{2,3}/igm;
	test2 = /[:]\/\/[..]/igm;

if(test1.test(url)==1 && url.search(test2)<0) 
{
	document.shortner.report.style.color = "green";
	document.shortner.report.value = "URL Verification Pass.";
	return true;
 } else {
	document.shortner.report.style.color="red";
	document.shortner.report.value="URL Verification Failed.";
	return false;
  }
}

function pattern_check() 
{
	var url,test1,test2,test3;
	url = document.linksstatus.uniquepattern.value;
	test1 = /(http:|https:)\/\/[A-Za-z0-9\.-]{3,}\.[A-Za-z]{2,3}/igm;
	test2 = /[:]\/\/[..]/igm;
	test3 = url.search("http://saxna.tk/");
	
if(test1.test(url)==1 && url.search(test2)<0 && test3==0) 
{
	document.linksstatus.report.style.color = "green";
    document.linksstatus.report.value = "URL Verification Pass.";
    return true;
} else {
	document.linksstatus.report.style.color = "red";
	document.linksstatus.report.value="URL Verification Failed.";
	return false;
 }
}
</script>
<style>
#tag {
color:black;
font-size:large;
font-weight:bolder;
}
#line {
color: orange;
font-size:x-large;
font-family:serif; 
}
#tagline
{
color:red;
font-size:normal;
}
</style>
</head>
<body>

<form name="shortner" method="post" action="processor.php" onsubmit="return url_check();">
<input type="text" name="report" style="border:none;font-size:large;" readonly /><br/>
<input type="text" name="url" oninput="url_check();"  value="<?php echo $_GET['url']; ?>" /><br/>
<input type="text" name="userstr" maxlength="10"  value="<?php echo $_GET['userstr']; ?>" /><br/>
<input type="submit" name="submit" />
</form>
<font><?php echo $_GET['report']; ?></font>

<form name="linksstatus" method="post" action="linksstatus.php" onsubmit="return pattern_check();">
<input type="text" name="report" style="border:none;font-size:large;" readonly /></br/>
<input type="text" name="uniquepattern" oninput="pattern_check();"  value="<?php echo $_GET['uniquepattern']; ?>" /><br/>
<input type="submit" name="submit" />
</form>
<font><?php echo $_GET['count']; ?></font>

