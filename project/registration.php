<?php
session_start();
$mysql1=new mysqli("localhost","root","","project2019");
if($mysql1->connect_error)
{
	die("Connection failed:".$mysql1->connect_error);
}
?>
<?php
$ier=$per=$err="";
if(isset($_POST["s1"]))
{
	if($_POST["pd"]==$_POST["p1"])
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
		$_SESSION['username']=$fname;
		$_SESSION['id']=$id;
		//setcookie("tcookie",$fname);
		$sql1="SELECT id FROM register WHERE id='$id'";
		$sql2="SELECT contact_no FROM register WHERE contact_no='$phno'";
		$sql3="SELECT email FROM register WHERE email='$email'";
		$sql="INSERT INTO register(fname,lname,id,course,hostel,roomno,contact_no,email,password)
		VALUES ('$fname','$lname','$id','$course','$hostel','$room','$phno','$email','$pass')";
		if($mysql1->query($sql)===true)
		{
			setcookie("tcookie",$fname);
			setcookie("id",$id);		
			$msg="Registration successful";
			echo "<script type='text/javascript'>
			alert('$msg');window.location='homepage1.php';</script>";
		}
		else 
				
			{
				$result = mysqli_query($mysql1,$sql1);
				$count = mysqli_num_rows($result);
				if($count==1)
					$ier="ID Already Exists!";
				$result1 = mysqli_query($mysql1,$sql2);
				$count1 = mysqli_num_rows($result1);
				if($count1==1)
					$per="PhoneNo Already Exists!";
				
				$result2 = mysqli_query($mysql1,$sql3);
				$count2 = mysqli_num_rows($result2);
				if($count2==1)
				$err="Email ID already exists!";
		}
	}
	else	
		$perr="Password not matching!";
		
	
}
/*if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['b2']))
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
<title>Registration Form</title>
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
background-color:BLUE;
cursor:pointer;
border-radius:50px;
height:35px;
align:right;
width:80px;
font-size:16px;
color:white;
}
.error{
	color:red;
	font-size:16px;
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
<script>
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

</script>
</head>
<body background="bg.png">
<a href="homepage.php" class="previous round"><font size="5px">&#8249;&#8249;Previous</font></a>
<form method="POST">
<fieldset style="width:600;height:400px;">
<legend align="center" style="font-style:bold;"><B>Sign Up</B></legend>
<table border="0" align="center" style="font-size:20px;">
<tbody style="color:BLACK;">
<tr>
<td><label for="name">FirstName </label></td>
<td><input id="name" maxlength="30" name="fname" type="text"placeholder="FirstName"required  autofocus/><span class="error">*</span></td>
</tr><br>

<tr>
<td><label for="lastname">LastName </label></td>
<td><input id="lastname" maxlength="30" name="lname" type="text" placeholder="LastName"/></td>
</tr>

<tr>
<td><label for="idno">IDNo. </label></td>
<td><input id="in" maxlength="10" name="rollno" type="text"required  placeholder="IDNo" /><span class="error">*<br><?php echo $ier;?></span>
</tr>

<tr>
<td><label for="course">Course </label></td>
<td><select name="course"><span class="error">*</span>
<option value="--Select Your Course--">--Select Your Course--</option>
<option value="BCA">B.C.A</option>
<option value="BSC">B.S.C</option>
<option value="BTECH">B.TECH</option>
<option value="BCOM">B.COM</option>
<option value="BBA">B.B.A</option>
<option value="BA">B.A</option>
<option value="BDES">B.DES</option>
<option value="MCA">M.C.A</option>
<option value="MTECH">M.TECH</option>
<option value="MCOM">M.COM</option>
<option value="MSC">M.S.C</option>
<option value="MA">M.A</option>
<option value="MBA">M.B.A</option>
<option value="MDES">M.DES</option>
<option value="LLB">L.L.B</option>
<option value="11">11th</option>
<option value="12">12th</option></select><span class="error">*</span>
</td>
</tr>
<tr>
<td><label for="hostel">Hostel </label></td>
<td><input id="hostel" maxlength="20" name="hostel" type="text" required placeholder="HostelName"/><span class="error">*</span></td>
</tr>
<tr>
<td><label for="room">Room No </label></td>
<td><input id="room" name="room" type="text" required placeholder="Room No"/><span class="error">*</span></td>
</tr>
<tr>
<td><label for="contact no">Contact no </label></td>
<td><input id="contact no" maxlength="10" name="cno" type="text"required placeholder="Contact No" /><span class="error">*<br> <?php echo $per;?></span></td>
</tr>


<tr>
<td><label for="email">Email_Address </label></td>
<td><input id="email" maxlength="40" name="email" type="email" required placeholder="Email ID"/><span class="error">* <br><?php echo $err;?></span></td>
</tr>


<tr>
<td><label for="password">Enter Password </label></td>
<td><input id="pd" maxlength="30" name="pd"
type="password" placeholder="Password of atleast 6 chars" required /><span class="error">*</span></td>
</tr><br>
<tr>
<td><label for="password1">Reconfirm Password </label></td>
<td><input id="p1" maxlength="30" name="p1" type="password" placeholder="Reconfirm Password" required /><span class="error">*</span></td>
</tr><br>
<tr><td></td>
<td><input type="reset" class="ab" />
 <input type="submit" class="ab" onclick="f1()" value="Sign Up" name="s1"></td>
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