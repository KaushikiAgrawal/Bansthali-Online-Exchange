<?php
session_start();
?>
<?php
if(isset($_POST["s1"]))
{
$mysql1=new mysqli("localhost","root","","project2019");
if($mysql1->connect_error)
{
	die("Connection failed:".$mysql1->connect_error);
}
		$pname=$mysql1->real_escape_string($_POST['pname']);
		$des=$mysql1->real_escape_string($_POST['desc']);
		$price=$mysql1->real_escape_string($_POST['price']);
		$cat=$mysql1->real_escape_string($_POST['cat']);
		$tag=$mysql1->real_escape_string($_POST['tag']);
		$img=$mysql1->real_escape_string($_POST['img']);
		$user=$_SESSION['id'];
		$sql="INSERT INTO product(name,description,price,category,tag,image,reg_id)
		VALUES ('$pname','$des','$price','$cat','$tag','$img','$user')";
		if($mysql1->query($sql)===true)
		{
			$msg="Product successfully added";
			echo "<script type='text/javascript'>
			alert('$msg');window.location='homepage1.php';</script>";
		}
		else
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql1);
	$mysql1->close();
}
	?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
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
<a href="homepage1.php" class="previous round"><font size="5px">&#8249;&#8249;Previous</font></a>
	<center><h2> PRODUCT DETAILS </h2></center>
	<table>
	<tr>
	<td style="padding-top:0;">
	<form method="POST">
       <fieldset style="width:600px;height:400px;">
			<legend ><b> Product </legend>

	<table style="color:white; font-size:30px; text-shadow:3px 1px 	black;">
		<tr>
	<td>	Name  </td> <th><input type="text" 	placeholder="EnterItemName" required name="pname"></th>
		</tr>
		<tr>
	<td>	Description </td>   <th>     <input type="text" name="desc"	required	placeholder="EnterDescription"></th>
		</tr>
		<tr>
	<td>	Price </td>   <th>        <input type="text" required	name="price"	placeholder="EnterPrice"></th>
		</tr>
		<tr>
	<td>	Category </td><th> 
		
		<select required name="cat">
		            <optgroup>
	                <option value="BEDDING/TRUNK">BEDDING/TRUNK</option>
			<option  value="STUDY TABLE">STUDY TABLE</option>
			<option  value="FAN">FAN</option>
			<option  value="BICYCLE">BICYCLE</option>
			<option  value="BOOKS">BOOKS</option>
			<option  value="UTENSILS">UTENSILS</option><br>
			<option  value="OTHER">OTHER</option><br>
			</optgroup></th>
		</tr>
		</select>
		<tr>
	<td>Tag</td><th><input type="text"placeholder="Enter another name for item" name="tag"></th>
		</tr>
	        <tr>
	<td>Add image</td><th><input type="file" name="img"></th>
		</tr>
		<tr>
	<th></th><th><input type="submit" class="button" value="Post the advertisment" name="s1"></th>
		</tr>
	   </table>	
	</fieldset>
	</form>
	</td>	
   <!-- Start WOWSlider.com BODY section -->
  <td style="padding-top:180px;">
<div id="wowslider-container1" style="width:600px;height:600px;">
<div class="ws_images"><ul>
		<li><img src="data1/images/books.jpg" alt="books" title="books" id="wows1_0"/></li>
		<li><img src="data1/images/bed_table.png" alt="Bed Table" title="Bed Table" id="wows1_1"/></li>
		<li><img src="data1/images/calculator1.jpg" alt="Calculator1" title="Calculator1" id="wows1_2"/></li>
		<li><img src="data1/images/book.jpg" alt="book" title="book" id="wows1_3"/></li>
		<li><img src="data1/images/digit_calculator.jpg" alt="Digit calculator" title="Digit calculator" id="wows1_5"/></li>
		<li><img src="data1/images/glass_kettle.jpg" alt="Glass Kettle" title="Glass Kettle" id="wows1_6"/></li>
		<li><img src="data1/images/hercules_cycle.jpg" alt="Hercules cycle" title="Hercules cycle" id="wows1_7"/></li>
		<li><img src="data1/images/study_table.jpg" alt="Study Table" title="Study Table" id="wows1_10"/></li>
		<li><img src="data1/images/plateset.jpg" alt="PlateSet" title="PlateSet" id="wows1_11"/></li>
		<li><img src="data1/images/trunk.jpg" alt="Trunk" title="Trunk" id="wows1_13"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="books"><span><img src="data1/tooltips/books.jpg" alt="books"/>1</span></a>
		<a href="#" title="Bed Table"><span><img src="data1/tooltips/bed_table.png" alt="Bed Table"/>2</span></a>
		<a href="#" title="Calculator1"><span><img src="data1/tooltips/calculator1.jpg" alt="Calculator1"/>3</span></a>
		<a href="#" title="book"><span><img src="data1/tooltips/book.jpg" alt="book"/>4</span></a>
		<a href="#" title="Digit calculator"><span><img src="data1/tooltips/digit_calculator.jpg" alt="Digit calculator"/>6</span></a>
		<a href="#" title="Glass Kettle"><span><img src="data1/tooltips/glass_kettle.jpg" alt="Glass Kettle"/>7</span></a>
		<a href="#" title="Hercules cycle"><span><img src="data1/tooltips/hercules_cycle.jpg" alt="Hercules cycle"/>8</span></a>
		<a href="#" title="Study Table"><span><img src="data1/tooltips/study_table.jpg" alt="Study Table"/>11</span></a>
		<a href="#" title="PlateSet"><span><img src="data1/tooltips/plateset.jpg" alt="PlateSet"/>12</span></a>
		<a href="#" title="Trunk"><span><img src="data1/tooltips/trunk.jpg" alt="Trunk"/>14</span></a>
	</div></div>
</div>
</td>
</tr>
</table>
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->          
</body>
</html>
