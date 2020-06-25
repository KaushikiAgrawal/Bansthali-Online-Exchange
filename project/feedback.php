<?php
	$mysql1=new mysqli("localhost","root","","project2019");
		if($mysql1->connect_error)
		{
			die("Connection failed:".$mysql1->connect_error);
		}
?>
<html>
<head> 
<style>
.feedbackform {
width: 460px;
font-family: arial;
border: 1px solid #AAA;
padding:10px;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
text-align:center;
}
.feedbackformheader {
font-size:20px;
font-weight:bold;
padding-top:10px;
padding-bottom:10px;
text-align:left;
}
body{
	
	background-image:url("bb.jpg");
	background-repeat:no-repeat;
	background-size:cover;
	color:white;	
}
textarea{
	background-color:rgb(210,210,210);
}
.button2 {
  background-color: black ;/* Green */
 border-radius: 16px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(10,10,10,0.70),0 17px 50px 0 rgba(10,10,10,0.50);
}
.feedback h3{
    font-size:20px;
    line-height:22px;
    border-bottom:1px solid #000;
    margin-bottom:11px;
    padding-bottom:4px;
} 
.feedback_textarea{
    font-size:18px;
    font-family: arial, sans-serif;
	width:100%;
	height:180px;
	border:1px solid #BBB;
	
}

div.feedback-default {
    padding:20px;   
    font-family: arial, sans-serif;
}

.feedback_button{
	width:400px;
	height:40px;
	 background-color:#e7e7e7; color: black;; 
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
			
			window.location="review.php";
		}	
	</script>		
</head>
<body  style="border:100px solid rgba(0,0,0,0.5;">	
<a href="homepage.php" class="previous round"><font size="5px">&#8249;&#8249;Previous</font></a>
<div>
    <div class="feedback-default">
		<fieldset>
		<legend class="feedbackformheader"><span style='font-size:20px;'>Feedback</span></legend>       
           <span style="font-size:20px;">Please provide your feedback below:</span>
        <form  method="POST" >
                <h2 class="feedback h3">How do you rate your overall experience?</h2>
                <p style="padding:4px;">
                    <label style="padding:4px;">
                    <input type="radio" name="experience" id="radio1" value="Average" >
                  <span style='font-size:22px;'> Average </span><span style='font-size:25px;color:yellow;'>&#9785;</span>
                    </label>

                    <label style="padding:4px";>
                    <input type="radio" name="experience" id="radio2" value="Good" >
                    <span style='font-size:22px;'>Good</span><span style='font-size:25px;color:yellow;'> &#9786;</span>
                    </label>

                    <label style="padding:4px";>
                    <input type="radio" name="experience" id="radio3" value="Excellent" >
                    <span style='font-size:22px;'>Excellent </span><span style='font-size:25px;color:yellow;'>&#9787;</span>
                    </label>
                </p>  
			
			<h3 class="feedback h3" >Your comments:<h3> 
			<textarea class="feedback_textarea" name="comments" rows="15" cols="50" required></textarea>  <br>
			<br><label for="name">Your Name:</label>
            <input type="text"  id="name" name="name" required>
			<label for="email"> Email:</label>
            <input type="email"  id="email" name="email" required>
            <br>   
			<br>&nbsp;&nbsp;
         	<input class="button2" type="submit" value="SUBMIT" name="s1">&nbsp;&nbsp;&nbsp;
			<button class="button2" onclick="f1()">SEE  REVIEWS</button>
    </form>
        </div> 
</div>
<?php
	$btn=$_POST["s1"];
	if(isset($btn))
	{
		
		$name=$mysql1->real_escape_string($_POST['name']);
		$comment=$mysql1->real_escape_string($_POST['comments']);
		$rating=$mysql1->real_escape_string($_POST['experience']);
		$email=$mysql1->real_escape_string($_POST['email']);
		$sql="INSERT INTO feedback(name,email,comment,rating)
		VALUES('$name','$email','$comment','$rating')";
		if($mysql1->query($sql)===true)
		{
			$msg="feedback successfully added";
			echo "<script type='text/javascript'>
			window.alert('$msg');</script>";
		}
		else
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql1);
		echo "ERROR: Could not able to execute statement";
		$mysql1->close();
					
	}
	?>
	
</body>
</html>