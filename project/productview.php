<?php
session_start();
$fn=$_COOKIE['id'];
$conn=new mysqli("localhost","root","","project2019");
if($conn->connect_error)
{
	die("Connection failed:".$conn->connect_error);
}
?>
<html>
<head>
<style>
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
.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clear floats after image containers */
.row1::after {
  content: "";
  clear: both;
  display: table;
}
.row1 {
  display: flex;
}

.column {
  flex: 33.33%;
  padding: 5px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	width: 300px;
	height:450px;
	word-wrap: break-word;
  margin: auto;
  text-align: center;
  font-family: arial;
  box-sizing:border-box;
  background:rgba(255,0,0,0.2);
  
}
.body{
	 opacity: 0.2;
}
.price {
  color: white;
  font-size: 22px;
}
.desc{
	font-size:18px;
}

/* Tooltip container */
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
 
}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 200px;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  border-radius: 5px;
 top: 100%;
  left: 50%; 
  margin-left: -60px;
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}


/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}
.ab {
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

</style>
<script>
function f1()
{
	window.location="homepage1.php";
}
</script>
</head>
<body background="book.jpg">
<table>
<tr>
<td>
<img src="box.jpg" width="80%" height="80%"/></td>
<td><font size="25px"><b><i><u>Banasthali Online Exchange</b></i></u></font></td>
</tr>
<tr>
<td>
<input type="button"onclick="f1()" class="ab" value="&#8249;&#8249;Previous"></button>

</td>
</tr>
</table>
<?php
	if(isset($_POST['wish']))
	{
		$pd= $_POST['wish'];
		$sql="INSERT INTO wishlist(pid,id) VALUES('$pd','$fn')";
		if($conn->query($sql)===true)
		{	
			$msg="Added to wishlist";
			echo "<script type='text/javascript'>
			alert('$msg');</script>";
		}
	}
?>
<table cellspacing="80px" style="border:3px groove pink;">
<caption style="font-size:40px;"><font style="background:rgba(255,0,0,0.4);"><i><b>Matched Items</b></i></font></CAPTION>
<?php
$item=$_SESSION['name'];
$sql=mysqli_query($conn,"SELECT * FROM product WHERE name like '%$item%' OR tag like '%$item%' OR category like '%$item%'");
	$count = mysqli_num_rows($sql);
	$i=0;
			if($count != 0)
			{
				while($row = mysqli_fetch_array($sql))
				{
					
					$ot=$row['image'];
					$ot1=strtoupper($row['name']);
					$ot2=$row['price'];
					$ot3=$row['description'];
					$ot4=$row['reg_id'];
					$ot9=$row['pid'];
					$row1=mysqli_query($conn,"SELECT * FROM register WHERE id='$ot4'");
					if($i%3==0)
					{
						echo "<tr>";
					}
					echo "<td> <div class='card'>";
				echo"<img src='$ot' alt='no image available' style='width:100%;height:200px;'/><br>";
				echo "<h2>$ot1</h2>";
				echo "<p class='price'>Price:$ot2</p>";
				echo "<p class='desc'> Description:$ot3</p>";
				echo "<form method='POST'><button type='submit' name='wish' value='$ot9'>Add To Wishlist</button><br></form>";
				while ($row2 = $row1->fetch_assoc())
				{
						$ot5=ucfirst($row2['fname']);
						$ot6=ucfirst($row2['hostel']);
						$ot8=$row2['roomno'];
						$ot7=$row2['contact_no'];
				echo"<div class='tooltip'><span style='font-size:20px;'>Seller's details</span>";
				echo "<span class='tooltiptext'>Name: $ot5";
				echo "<br>Hostel name: $ot6";
				echo "<br>Room No:$ot8";
				echo "<br>Contact No: $ot7</span>";
				echo "</div>";
				
				}
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
				$msg="No Items found";
			echo "<script type='text/javascript'>
			alert('$msg');window.history.back();</script>";
			}
?>
</table>
</body>
</html>