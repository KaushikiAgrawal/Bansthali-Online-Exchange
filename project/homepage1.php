<?php
session_start();
$fn=$_COOKIE['tcookie'];
?>
<html>
<head>
<script>
function f3()
{
}
</script>
<style>
div{
	background-color:transparent;
	font-size:25px;
	color:white;
	
    }
body{ 	
	background-image:url("book.jpg");
	background-size:cover;
	background-attachment:fixed;
	}
	
   p{
	font-family:Forte;
	font-size:40px;
	color:green;
   }
h3{
	text-align:center;
}

.topnav
	{
		background-color:transparent;
	}
.topnav a:hover{
	background-color:#ddd;
	color:white;
	}
.topnav a{
		float:right;
		color:black;	
		
		padding:14px 16px;
		text-decoration:none;
		font-size:22px;
	}
	.button11
		{
			background-color:#4caf50;
			color:#fff;
			padding:15px 25px;
			height:55px;
			text-align:center;
			cursor:pointer;
			border-radius:15px;
			font-size:25px;
			box-shadow:0 19 green;
			
		}
	.button11:active{
			background-color:#3e8e41;
			box-shadow:0 5px #666;
			transform:translateY(4px);
			}
	.button11:hover{
			background-color:#3e8e41;
		}
		.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  min-width: 120px;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
.button {
  padding: 8px 25px;
  font-size: 20px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 10px;
  box-shadow: 0 9px green;
}

.button:hover {background-color: #3e8e41}
.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
    </style>
	<?php
		
		$item=$_POST['sb'];
		$btn=$_POST['search'];
		if(isset($btn)&& $item!="")
		{
			$_SESSION['name']=$item;
			echo "<script type='text/javascript'>
			window.location='productview.php';</script>";
		}
?>

<?php

		if(isset($_POST['b1']))
		{
			$_SESSION['name']="trunk";
			echo "<script type='text/javascript'>
			window.location='productview.php';</script>";
		}
		if(isset($_POST['b2']))
		{
			$_SESSION['name']="table";
			echo "<script type='text/javascript'>
			window.location='productview.php';</script>";
		}
		if(isset($_POST['b3']))
		{
			$_SESSION['name']="fan";
			echo "<script type='text/javascript'>
			window.location='productview.php';</script>";
		}
		if(isset($_POST['b4']))
		{
			$_SESSION['name']="cycle";
			echo "<script type='text/javascript'>
			window.location='productview.php';</script>";
		}
		if(isset($_POST['b5']))
		{
			$_SESSION['name']="book";
			echo "<script type='text/javascript'>
			window.location='productview.php';</script>";
		}
		if(isset($_POST['b6']))
		{
			$_SESSION['name']="utensils";
			echo "<script type='text/javascript'>
			window.location='productview.php';</script>";
		}
		if(isset($_POST['b7']))
		{
			$_SESSION['name']="other";
			echo "<script type='text/javascript'>
			window.location='productview.php';</script>";
		}
?>

  </head>
<body>

<table>
   <tr>
     <th>
        <img src="box.jpg" width="160px" height="130px"/>
     </th>
    
     <th><font size="22px"><b><i><u>Banasthali Online Exchange</b></i></u></font>
     </th>
   </tr>
</table>
<?php
$_SESSION['username']=$un;
?>
<form method="POST">
<div class="topnav" align="center" style="margin:auto;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<b><input type="search" style="width:40%;height:35px;" name="sb" placeholder="Search here"/></b>

<button name="search" type="submit" style="background-color:transparent;color:black;width:120px;height:40px;font-size:15px;"><img src="s2.png" width="35px" height="20px" align="left" ></img><big><center>Search<center></big></button>
<div class="dropdown" style="float:right;">
  <button class="dropbtn">Welcome<?php echo " $fn" ;?></button>
  <div class="dropdown-content">
  <a href="profile.php">My Profile</a>
   <a href="myadd.php">My Ad</a>
	<a  href="wishlist.php" >Wishlist</a>
	 <a href="homepage.php" onclick="f3()">Log Out</a>
  </div>
</div>	
</div>
<br><br>	
<center><a href="prod_details.php"><button class="button11" type="button">Post Ad</button></a></center>
</br><br>
<table cellspacing="20px" style="border:3px groove pink;">
<tr>
	<td><div class='card'>
			<img src="trunk.jpg" alt='no image available' style='width:400px;height:200px;'/><br>
			<center><input class="button"type="submit" name="b1" value="TRUNKS" ></center>
		</div>
	</td>
	<td><div class='card'>
			<img src="st.jpg" alt='no image available' style='width:400px;height:200px;'/><br>
				<center><input type="submit" name="b2"value="TABLES" class="button" ></center>
		</div>
	</td>
	<td><div class='card'>
			<img src="fan2.jpg" alt='no image available' style='width:400px;height:200px;'/><br>
				<center><input type="submit" name="b3"value="FANS" class="button"></center>
		</div>
	</td>
</tr>
	<td> <div class='card'>
			<img src="ls.jpg" alt='no image available' style='width:400px;height:200px;'/><br>
				<center><input type="submit" name="b4"value="CYCLES" class="button"></center>
		</div>
			<td> <div class='card'>
				<img src="books.jpg" alt='no image available' style='width:400px;height:200px;'/><br>
				<center><input type="submit" name="b5"value="BOOKS" class="button"></center>
				</div>
				<td> <div class='card'>
			<img src="p20.jpg" alt='no image available' style='width:400px;height:200px;'/><br>
				<center><input type="submit" name="b6"value="UTENSILS" class="button"></center>
				</div>
				</td>
				</tr>
				<tr>
				<td> <div class='card'>
				<img src="collage1.jpg" alt='no image available' style='width:400px;height:200px;'/><br>
				<center><input type="submit" name="b7"value="OTHERS" class="button"></center>
				</div>
				</td>
				</tr>
				
</table>
</form>

</BODY>
</HTML>						