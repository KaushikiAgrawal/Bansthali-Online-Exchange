<?php
session_start();
	$mysql1=new mysqli("localhost","root","","project2019");
		if($mysql1->connect_error)
			die("connection failed:".$mysql1->connect_error);
	
	
?>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	width: 300px;
	height:350px;
	word-wrap: break-word;
  margin: auto;
  text-align: center;
  font-family: arial;
  box-sizing:border-box;
  background:rgba(255,0,0,0.2);
  
}
.price {
  color: white;
  font-size: 22px;
}
.desc{
	font-size:18px;
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
  background-color: #4CAF50;
  color: black;
}


.round {
  border-radius: 90px;
}
</style>
</head>
<body background="book.jpg">
<table>
<tr>
<td>
<img src="box.jpg" width="80%" height="80%"/></td>
<td><font size="25px"><b><i><u>Banasthali Online Exchange</b></i></u></font></td>
</tr>
<tr><td><a href="homepage1.php" class="previous round"><font size="5px">&#8249;&#8249;Previous</font></a></td></tr>
</table>
<center><font style="background:rgba(255,0,0,0.4);font-size:40px;"><i><b>My Ads</b></i></font></center>
<table cellspacing="80px" style="border:3px groove pink;margin:auto;">
<?php
$user=$_COOKIE['id'];
$sql=mysqli_query($mysql1,"SELECT * FROM product WHERE reg_id='$user'");
$count = mysqli_num_rows($sql);
	$i=0;
			if($count != 0)
			{
				while($row = mysqli_fetch_array($sql))
				{
					$ot=$row['image'];
					$ot1=strtoupper($row['name']);
					$ot2=$row['price'];
					$ot3=$row['pid'];
					if($i%3==0)
					{
						echo "<tr>";
					}
					echo "<td> <div class='card'>";
				echo"<img src='$ot' alt='no image available' style='width:100%;height:200px;'/><br>";
				echo "<h2>$ot1</h2>";
				echo "<p class='price'>Price:$ot2</p>";
				echo "<form method='POST'><button type='submit' name='c1' value=$ot3/>Delete Ad</button>&nbsp";
				echo "<button type='submit' name='c2' value=$ot3 />Update Ad</button>";
				echo "</form>";
				echo "</div>"; 
				echo "</td>";
					if($i%3==2)
					{
						echo "</tr>";
					}
					$i++;
				}				
			}
			else
			{
					$msg="No Ad Uploaded";
					echo "<script type='text/javascript'>
				alert('$msg');window.location='homepage1.php';</script>";
			}
if(isset($_POST["c1"]))
{
	$s=$_POST["c1"];
	$c=mysqli_query($mysql1,"DELETE FROM product WHERE pid='$s'");
	if($c===true)
	{
	 $msg="Ad deleted";
			echo "<script type='text/javascript'>
			alert('$msg');window.location='myadd.php';</script>";
	}
		
}
if(isset($_POST["c2"]))
{
			$p= $_POST["c2"];
			$_SESSION['pid']=$p;
			echo "<script type='text/javascript'>
			window.location='update.php';</script>";
			
}
?>
</table>
</body>
</html>