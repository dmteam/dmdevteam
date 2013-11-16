<?php session_start(); 
$user = $_SESSION ['username'];
echo "Hi $user";
?>
<br>
Current Balance: 2600000 PHP<br>
Percent Remaining: 80%<br><br>
Social Service <br>
Econmic Service <br>
Debt Burden <br>
General Public Service <br>
Defense <br>




<script type="text/javascript">
function enableButton() {
if(document.getElementById('option').checked){
document.getElementById('b1').disabled='';
} else {
document.getElementById('b1').disabled='true';
}
}
</script>

<!--start -->
<!--php connection -->



<?php
include_once "functions.php";

connect();


if(isset($_POST['fname'])){


    $firstname = protect($_POST['fname']);
    $lastname = protect ($_POST['lname']);
	
  
		$time = time();
		$actual_time = date ('M d Y @H:i:s', $time );
  
  $errors = array();
   
        if(!$firstname){
            $errors[] = "*firstname is not defined!";
        }
		
		  if(!$lastname){
            $errors[] = "*lastname is not defined!";
        }
        
        if($email){
            $checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
            if(!preg_match($checkemail, $email)){
                $errors[] = "E-mail is not valid, must be name@server.tld!";
            }
        }
        
   
        
        if($email){
            $sql2 = "SELECT * FROM `in_employee` WHERE `in_email`='".$email."'";
            $res2 = mysql_query($sql2) or die(mysql_error());
            
                if(mysql_num_rows($res2) > 0){
                    $errors[] = "The e-mail address you supplied is already in use of another user!";
                }
        }
        
         if(count($errors) > 0){
            foreach($errors AS $error){
                echo "<p>$error</p>";
            }
        }else {
	
		$time = time();
		$actual_time = date ('M d Y @H:i:s', $time );
		
		

		
            $sql4 = "INSERT INTO `kd_user`
                    (`kd_email`,`kd_pass`,`kd_percentage`)
                    
                    VALUES ('".$firstname."','".$lastname."','100')";
           
            $res4 = mysql_query($sql4) or die(mysql_error());

            echo "You have successfully registered with the username <b>'.$username.'</b> and the password of <b>'.$password.'</b>! <br><br><a href= 'index.php'> Click Here to Home </a>";
            
        }
    }
    


?>
<form id="form" name="form" method="post" action="index.php">
<h1>Sign-up form</h1>

<br>
Email:
<br>
<input type="text" name="fname"  />
<br>
Password:<br>
<input type="pass" name="lname"  />
<br>


<input type="checkbox"name="option" id="option" onclick="javascript:enableButton();"><br>

<a href='#'> I agree to the Terms and Conditions above.(Check to proceed)</a><br>

<button type="submit" name = "b1" id="b1"  onclick="form.action='registration.ph'method='post' ;" disabled>Sign-up</button><br>



</form>


<!--ending -->