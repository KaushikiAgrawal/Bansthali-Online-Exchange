<?php
session_start();
?>
<html>
<head>
<style>

p{
font-family:Forte;
font-size:40px;

}
.topnav{
  background-color: transparent;
  
  }

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 22px;
}
.btn{
padding:14px 16px;
height:35px;
font-size:20px;
text-decoration:none;
overflow:hidden;
}
/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
  
}
.b{
background:url("sellbutton2.jpg");
width:100px;
height:50px;
}
button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px green;
}

button:hover {background-color: #3e8e41}
button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</style>
	<?php
		
		$item=$_POST['sb'];
		$btn=$_POST['search'];
		if(isset($btn))
		{
			$_SESSION['name']=$item;
			echo "<script type='text/javascript'>
			window.location='productview1.php';</script>";
		}
?>
</head>
<body background="book.jpg">
<table>
<tr>
<td>
<img src="box.jpg" width="80%" height="80%"/></td>
<td><font size="25px"><b><i><u>Banasthali Online Exchange</b></i></u></font></td>
</tr>
</table>
<form method="POST">
<div class="topnav">
  <a class="active" href="#home">Home</a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="search" id="s1" name="sb" placeholder="Search the required product here" style="align:center;width:350px;height:35px;text-align:center;margin-bottom:11px;margin-top:11px;"/>
  <input type="submit" name="search" value="Search" style="margin-bottom:11px;margin-top:11px;width:110px;height:35px;cursor:pointer;border-radius:14px;"/>
  <mark><a href="aboutus.php">About Us</a>
  <a href="login1.php" style="float:right">Login</a>
  <a href="registration.php" style="float:right">Sign up</a>
  <a href="feedback.php" style="float:right">Feedback</a></mark>

</div>
<marquee behaviour="slide" direction="right" scrollamount="12"><img src="cycle.jpg" width="250px" height="250px"/>
<img src="fan2.jpg" height="250px" width="250px"/>
<img src="calculator.jpg" width="250px" height="250px"/>
<img src="trunck.jpg" width="250px" height="250px"/>
<img src="studytable.jpg" width="250px" height="250px"/>
<img src="books.jpg" width="250px" height="250px"/>
</marquee>
<br>
<br><br><br>
<center><a href="login1.php"><button type="button">Post an Ad</button></a></center>
</form>
</BODY>
</HTML>