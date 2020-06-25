<?php
$conn=new mysqli("localhost","root","","project2019");
if($conn->connect_error)
{
	die("Connection failed:".$conn->connect_error);
}
?>
<html>
<head>
<style>
body{ 	
	background-image:url("book.jpg");
	background-size:cover;
	background-attachment:fixed;
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
/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
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
<a href="homepage1.php" class="previous round"><font size="5px">&#8249;&#8249;Previous</font></a>
<h1><center>My Wishlist</center></h1>

<table cellspacing="80px" style="border:3px groove pink;">
<?php
if(isset($_POST["wish"]))
{
	$s=$_POST["wish"];
	$c=mysqli_query($conn,"DELETE FROM wishlist WHERE pid='$s'");
	if($c==true)
	 $msg="Item Removed From Wishlist";
			echo "<script type='text/javascript'>
			alert('$msg');</script>";
		
}
$id1=$_COOKIE['id'];
$sql=mysqli_query($conn,"SELECT * FROM wishlist WHERE id= '$id1'");
	$count = mysqli_num_rows($sql);
	$i=0;
			if($count != 0)
			{
				while($row = mysqli_fetch_array($sql))
				{
					$ot=$row['pid'];
					$sql2=mysqli_query($conn,"SELECT * FROM product WHERE pid='$ot'");
					while($row1 = mysqli_fetch_array($sql2))
					{
					$ot1=$row1['image'];
					$ot2=ucfirst($row1['name']);
					$ot3=ucfirst($row1['description']);
					$ot4=$row1['price'];
					$ot5=$row1['reg_id'];
					$row2=mysqli_query($conn,"SELECT * FROM register WHERE id='$ot5'");
					if($i%3==0)
					{
						echo "<tr>";
					}
					echo "<td> <div class='card'>";
				echo"<img src='$ot1' alt='no image available' style='width:100%;height:200px;'/><br>";
				echo "<h2>$ot2</h2>";
				echo "<p class='price'>Price:$ot4</p>";
				echo "<p class='desc'> Description:$ot3</p>";
				echo "<form method='POST'><button type='submit' name='wish' value='$ot'>Delete From Wishlist</button><br></form>";
				while ($row3 = $row2->fetch_assoc())
				{
						$ot6=ucfirst($row3['fname']);
						$ot7=ucfirst($row3['hostel']);
						$ot8=$row3['roomno'];
						$ot9=$row3['contact_no'];
				echo "<div class='tooltip'>Seller's details";
				echo "<span class='tooltiptext'>Name: $ot6";
				echo "<br>Hostel name: $ot7";
				echo "<br>Room No:$ot8";
				echo "<br>Contact No: $ot9</span>";
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
			
			}
			else
			{
				$msg="No Data Found!!";
			echo "<script type='text/javascript'>
			alert('$msg');window.location='homepage1.php';</script>";
			}

?>
</table>
</body>
</html>