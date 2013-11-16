<?php session_start(); ?>
<?php

if(isset($_POST['username']))
{
$username = $_POST['username'];
$password = $_POST['password'];

if ($username && $password)
{
  $con = mysql_connect("localhost", "kabantay_admin", "adminpass") or die(mysql_error());
    $db = mysql_select_db("kabantay_data", $con);

$query = mysql_query("SELECT * FROM kd_user WHERE kd_email = '$username' ");

$numrows = mysql_num_rows($query);

if ($numrows !=0)
{
//code to login

	while ($row = mysql_fetch_assoc($query))
	{
		$dbusername = $row ['kd_email'];
		$dbpassword = $row ['kd_pass'];
              
	}
//check

if ($username==$dbusername && $password==$dbpassword)
{

session_start();
	
$_SESSION ['username'] = $dbusername;




	}
	
	
else
die ("incorrect username/password");

}

	
else
die ("incorrect username/password");
}
}

else
die ("You must Login");


?>



