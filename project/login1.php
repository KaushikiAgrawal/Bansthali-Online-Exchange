<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$mysql1=new mysqli("localhost","root","","project2019");
		if($mysql1->connect_error)
			die("connection failed:".$mysql1->connect_error);
      $myusername = mysqli_real_escape_string($mysql1,$_POST['email']);
      $mypassword = mysqli_real_escape_string($mysql1,$_POST['password']); 
      $sql = "SELECT * FROM register WHERE email = '$myusername' and password = '$mypassword'";
	  $result = mysqli_query($mysql1,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) 
	  {
        session_register("$myusername");
        $_SESSION['id'] = $row["id"];
		$_SESSION['username']=$row['fname']; 
		setcookie("tcookie",$row['fname']);	
		setcookie("id",$row['id']);
        header("location: homepage1.php");
      }
	  else
		{
         echo "<script type='text/javascript'>
		 window.alert('Your Login Name or Password is invalid')</script>";
      }
   }
?>
<html>
<head>
<style>
.font1{
font-size:20px;
color:white;
}
body{
background-image:url("Ho6hQWs.jpg");
height:"100px";
width:"100px";
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 10px 15px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}


.round {
  border-radius: 90px;
}
</style>
</head>
<body>
<a href="homepage.php" class="previous round"><font size="5px">&#8249;&#8249;Previous</font></a>
<center>
<fieldset style="height:50%;width:50%;">
<legend><font color="white">LOGIN</font></legend>
<form method="POST">
<table>
<tr class="font1">
<br><br><br>
<td>
<b>UserName:</b></td><td><input type="text" name="email" placeholder="UserName" size="30px" autofocus style="height:30px;"><br></td>
</tr>
<tr class="font1">
<td>
<b>Password:</b></td><td><input type="password" name="password" placeholder="Password" size="30px"style="height:30px;"><br></td>
</tr>
<tr>
<td></td>
<td><button name="b1" style="background-color:green;font-size:20px;border-radius:8px;color:white; width:90px; text-align:center;cursor:pointer";><img src="key2.png" height="25px" width="20px" align="left">Login</button><br></td>
</tr>
<tr class="font1">
<td></td>
<td><font color="white"><b>Don't have an Account?</b></font><br></td>
</tr>
<tr class="font1">
<td></td>
<td>
<button name="submit1" style="font-size:20px;border-radius:8px;color:white;width:220px;text-align:center;background-color:transparent;cursor:pointer;" onclick='window.open("registration.php")'><b>Create Account Now</b><br></button>
</td>
</tr>
</table>
</form>
</center>
</fieldset>
</body>
</html>