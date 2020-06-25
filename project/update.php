<?php
session_start();
	$mysql1=new mysqli("localhost","root","","project2019");
		if($mysql1->connect_error)
			die("connection failed:".$mysql1->connect_error);
?>
<html>
    <style>
	body{
		background-image:url("cart1.jpg");
			background-size:cover;	
	}
	h2{
		color:white;
		font-family:colonna MT;
		font-size:40px;
		margin:auto;
		text-shadow:5px 3px orange;
		text-decoration:underline;

	}
	fieldset{
			border:2px solid white;
			text-align:left;
			width:30%;
			height:30%;
			font-size:30px;
				
		}
		
	legend{
		font-size:29px;
		color:white;
		font-style:bold;
		}

	
		.button {
  padding: 8px 14px;
  font-size: 18px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #2980B9    ;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #154360;
}

.button:hover {background-color: #5499C7  }
.button:active {
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

<?php

	$o=$_SESSION['pid'];
	$sql=mysqli_query($mysql1,"SELECT * FROM product WHERE pid='$o'");
	$count = mysqli_num_rows($sql);
			if($count != 0)
			{
					$row=mysqli_fetch_array($sql);
					$ot=$row['name'];
					$ot1=($row['description']);
					$ot2=$row['price'];
					$ot3=$row['tag'];
					$ot4=$row['image'];
					
			}	
			if(isset($_POST["s1"]))
			{
		$name=$mysql1->real_escape_string($_POST['pname']);
		$des=$mysql1->real_escape_string($_POST['desc']);
		$price=$mysql1->real_escape_string($_POST['price']);
		$tag=$mysql1->real_escape_string($_POST['tag']);
		$p="UPDATE product SET name='$name',description='$des',price='$price',tag='$tag' WHERE pid='$o'";
		if($mysql1->query($p)===true)
		{
			//setcookie("tcookie",$fname);
			//setcookie("id",$id);			
			$msg=" Ad Updated";
			echo "<script type='text/javascript'>
			alert('$msg'); window.location='homepage1.php';</script>";
		}
		else
			echo "error";
}
?>
<a href="homepage1.php" class="previous round"><font size="5px">&#8249;&#8249;Previous</font></a>
	<center><h2> Update Product </h2></center>
	<form method="POST">
      <center> <fieldset style="width:600px;height:400px;">
			<legend ><b> Update Product </legend>

	<table style="color:white; font-size:30px; text-shadow:3px 1px 	black;">
		<tr>
	<td>	Name  </td> <?php echo"<th><input type='text'  value='$ot'required name='pname'></th>"?>
		</tr>
		<tr>
	<td>	Description </td> <?php echo"  <th> <input type='text' value='$ot1' name='desc'required></th>"?>
		</tr>
		<tr>
	<td>	Price </td>  <?php echo" <th>    <input type='text' required value='$ot2' name='price'></th>"?>
		</tr>
		<tr>
	<td>	Tag </td><?php echo" <th><input type='text' name='tag' value='$ot3'></th>"?>
		</tr>
	        <tr>
	<td>Uploaded Image</td><?php echo" <th><input type='image' src='$ot4'name='img' style='width:150px;height:120px;'></th>"?>
		</tr>
		<tr>
	<th></th><th><?php echo"<input type='submit' class='button' value='Update the advertisment' name='s1'></th>"?>
		</tr>
	   </table>	
	</fieldset></center>
	</form>
	</body>
</html>
