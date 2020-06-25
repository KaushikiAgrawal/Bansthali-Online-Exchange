<?php
	$mysql1=new mysqli("localhost","root","","project2019");
		if($mysql1->connect_error)
		{
			die("Connection failed:".$mysql1->connect_error);
		}
?>
<style>
.name {
  color: grey;
  font-size: 22px;
}
.desc{
	font-size:18px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	width: 300px;
	height:200px;
	word-wrap: break-word;
  margin: auto;
  text-align: center;
  font-family: arial;
  box-sizing:border-box;
  background:rgb(255,182,193); 
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
body{
	background-size:cover;
}
</style>
<body background="bg4.jpg">
<a href="feedback.php" class="previous round"><font size="5px">&#8249;&#8249;Previous</font></a>
<table cellspacing="35px" style="border:3px groove pink;margin:auto;">
<caption style="font-size:50px;color:black;text-decoration:underline;"> REVIEWS</caption>
	<?php
		$sql=mysqli_query($mysql1,"SELECT * FROM feedback ");
	$count = mysqli_num_rows($sql);
	$i=0;
			if($count !=0)
			{
				while($row = mysqli_fetch_array($sql))
				{
					$ot1=$row['name'];
					$ot2=$row['comment'];
					$row1=$sql;
					if($i%3==0)
					{
						echo "<tr>";
					}
					echo "<td> <div class='card'>";
				echo "<p class='name'><b>Name:</b>  $ot1</p>";
				echo "<p class='desc'> <b>Comment:</b>  $ot2</p>";
				//while ($row2 = $row1->fetch_assoc())
				
				//		$ot5=ucfirst($row2['fname']);
				
				//<p><button>Add to Cart</button></p>
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
				echo "<script type='text/javascript'>
				window.alert('No reviews found add feedback');window.location='feedback.php';</script>";
			}
?>
</table>
</body>