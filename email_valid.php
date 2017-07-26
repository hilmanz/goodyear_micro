<?php
mysql_connect('10.18.69.1','root','coppermine');
mysql_select_db('goodyear');
if(isset($_POST['name']))
{
	$email_address = mysql_real_escape_string(trim($_POST['name']));
	$sql = "SELECT `email` FROM `datalomba` WHERE `email` = '$email_address' AND n_status=1";
	$myquery = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($myquery) !=0)
	{
		$row = mysql_fetch_array($myquery);
		echo 'exist';
	}
	else
	{
		echo 'not exist';
	}
}
?>
