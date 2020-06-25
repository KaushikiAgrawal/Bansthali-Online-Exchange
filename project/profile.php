<?php
session_start();
$fn=$_COOKIE['id'];
$mysql1=new mysqli("localhost","root","","project2019");
if($mysql1->connect_error)
{
	die("Connection failed:".$mysql1->connect_error);
}
?>
<?php
if(isset($_POST["s1"]))
{
		$fname=$mysql1->real_escape_string($_POST['fname']);
		$lname=$mysql1->real_escape_string($_POST['lname']);
		$id=$mysql1->real_escape_string($_POST['rollno']);
		$course=$mysql1->real_escape_string($_POST['course']);
		$hostel=$mysql1->real_escape_string($_POST['hostel']);
		$room=$mysql1->real_escape_string($_POST['room']);
		$phno=$mysql1->real_escape_string($_POST['cno']);
		$email=$mysql1->real_escape_string($_POST['email']);
		$pass=$mysql1->real_escape_string($_POST['pd']);
		$p="UPDATE register SET fname='$fname',lname='$lname',id='$id',course='$course',hostel='$hostel',roomno='$room',contact_no='$phno',email='$email',password='$pass' WHERE id='$fn'";
		if($mysql1->query($p)===true)
		{
			//setcookie("tcookie",$fname);
			//setcookie("id",$id);			
			$msg="Profile Updated";
			echo "<script type='text/javascript'>
			alert('$msg'); window.location='homepage1.php';</script>";
		}
		else
			echo "error";
}
/*if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['rollno']))
	{
		f2();
	}
		function f2()
		{
		$p=$mysql1->real_escape_string($_POST['rollno']);
		echo $p;
		echo"hello";
		$sql2="SELECT * FROM register where id=$p";
		if($mysql1->query($sql2)===true)
			echo "<script type='text/javascript'>window.alert('ID already exists')</script>";
		else
			echo "<script type='text/javascript'>window.alert('CHECK')</script>";
		}*/
?>
<html>
<head>
<title>Profile Page</title>
<style>
fieldset{
background-color:transparent;
margin-bottom:auto;
margin-left:auto;
margin-right:auto;
color:black;
border-color:black;
}
.ab{
font:inherit;
background-color:transparent;
cursor:pointer;
border-radius:50px;
height:40px;
align:right;
width:90px;
font-size:19px;
color:black;
}
button {
  padding: 8px 10px;
  font-size: 18px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 10px;
  box-shadow: 0 9px green;
}

button:hover {background-color: #3e8e41}
button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
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
<!--<script>
function f1()
{
	var a =document.getElementById("pd").value;
	var b =document.getElementById("p1").value;
	var c=document.getElementById("in").value;
	if(a!=b)
	{
		window.alert("Password not matching!!");
	}
	if(a.length<6 &&a==b)
		window.alert("Weak password!! Length must be greater than 6");
	if(c.length!=10)
		window.alert("Invalid ID No.");
}

</script>-->
</head>
<body background="b.jpg">
<a href="homepage1.php" class="previous round"><font size="5px">&#8249;&#8249;Previous</font></a>
<?php
	$sql=mysqli_query($mysql1,"SELECT * FROM register WHERE id='$fn'");
	$count = mysqli_num_rows($sql);
			if($count != 0)
			{
					$row=mysqli_fetch_array($sql);
					
					$ot=$row['fname'];
					$ot1=($row['lname']);
					$ot2=$row['id'];
					$ot3=$row['course'];
					$ot4=$row['hostel'];
					$ot5=$row['roomno'];
					$ot6=$row['contact_no'];
					$ot7=$row['email'];
					$ot8=$row['password'];
			}	
?>
<form method="POST">
<fieldset style="width:600;height:400px;">
<legend align="center" style="font-style:bold;"><B>UPDATE PROFILE</B></legend>
<table border="0" align="center" style="font-size:20px;">
<tbody style="color:BLACK;">
<tr>
<td><label for="name">FirstName </label></td>
<?php echo"<td><input id='name' maxlength='30'value='$ot' name='fname' type='text' required /></td>"?>
</tr><br>

<tr>
<td><label for="lastname">LastName </label></td>
<?php echo"<td><input id='lastname' maxlength='30' name='lname' type='text' value='$ot1'/></td>"?>
</tr>

<tr>
<td><label for="idno">IDNo.</label></td>
<?php echo "<td><input id='in' maxlength='10' name='rollno' type='text' required  value='$ot2'/><br></td>"?>
</tr>

<tr>
<td><label for='course'>Course </label></td>
<?php echo "<td><input type='text' id='course' value='$ot3' name='course'></td>"?>
</td>
</tr>
<tr>
<td><label for="hostel">Hostel </label></td>
<?php echo"<td><input id='hostel' maxlength='20' value='$ot4' name='hostel' type='text' required /></td>"?>
</tr>
<tr>
<td><label for="room">Room No </label></td>
<?php echo"<td><input id='room' value='$ot5'name='room' type='text' required /></td>"?>
</tr>
<tr>
<td><label for="contact no">Contact no </label></td>
<?php echo"<td><input id='contactno'value='$ot6' maxlength='10' name='cno' type='text'required  /></td>"?>
</tr>


<tr>
<td><label for="email">Email_Address </label></td>
<?php echo"<td><input id='email' maxlength='40' value='$ot7'name='email' type='email' required /></td>"?>
</tr>


<tr>
<td><label for="password">Enter Password </label></td>
<?php echo"<td><input id='pd' maxlength='30' name='pd' value='$ot8'type='text' required /></td>"?>
</tr><br>
<tr><td></td>
<td>
 <button type="submit" name="s1">Update Profile</button></td>
</tr>
</tbody>
</table>
</form>
</fieldset>
</body>
<?php
$mysql1->close();
?>
</html>