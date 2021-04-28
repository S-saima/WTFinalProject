<?php
session_start();
?>

<?php 

if ($_SERVER['REQUEST_METHOD']=="POST") {
	

	$hostname = "localhost";
    $username = "user";
    $password = "123";
    $dbname = "finalproject1";

	
	
	$conn1 = mysqli_connect($hostname, $username, $password, $dbname);
	if(mysqli_connect_error()) {
		echo "Database Connection Failed!...";
		echo "<br>";
		echo mysqli_connect_error();
	}
	else {
		echo "Database Connection Successful!";


		$stmt1 = mysqli_prepare($conn1, "insert into feedback (ComplainBox, Rating) values (?, ?)");
		mysqli_stmt_bind_param($stmt1, "ss", $a1, $a2);
		$a1 = $_POST['complain'];
        $a2 = $_POST['rating'];
		$res = mysqli_stmt_execute($stmt1);

		if($res) {
			echo "Data Insert Successful!";
			 header("Location: SButton.php ");
        exit();
		}
		else {
			echo "Failed to Insert Data.";
			echo "<br>";
			echo $conn1->error;
		}
	}

	mysqli_close($conn1);
	
}
	?>


<!DOCTYPE html>
<html>
<head>
<title>Review</title>
</head>
<body style="height: 100vh; background-size: cover;" background= "rating.jpg" >
	
<center>
	
	
<h4 style="color: black; font-family: cooper black;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h4>	
<h1 style=" color: black; text-align:center; text-shadow: 2px 2px 5px #7E354D; font-family: cooper black;">Complain/Feedback</h1>
</center>

<font size ="5" color="black">

	

</center>


</body>
</html>
	
  <form name="jsForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
 <fieldset >


 <center>

<br>
<br>

<b>
<label for="complain"></label>
<textarea name="complain" id="complain" rows="8" cols="40" placeholder="Complain Box"></textarea>
<br>
<br>
<br>
<font size="4">
<label for="rating" >Rating: </label>
<input type="radio" name="rating" id="rating" value="1" >
<label for="one">1</label>

<input type="radio" name="rating" id="rating" value="2" >
<label for="two">2</label>

<input type="radio" name="rating" id="rating" value="3" >
<label for="three">3</label>

<input type="radio" name="rating" id="rating" value="4" >
<label for="four">4</label>

<input type="radio" name="rating" id="rating" value="5" >
<label for="five">5</label>

</font>



</center>

 </fieldset></b>
<center>
	<br>
<input style="font-family: 'Cooper Black'; color: #583759; font-size : 15px; width: 80px; height: 30px;" type="submit" value="Submit">
<p id="errorMsg"></p>

</center>
</form>
</font>

<script>
        function validate() {
            var isValid = false;
            var complain = document.forms["jsForm"]["complain"].value;
            var rating = document.forms["jsForm"]["rating"].value;
            

            if(complain == "" || rating == "" ) {
                document.getElementById('errorMsg').innerHTML = " <b>Please Give Your Feedback";
                document.getElementById('errorMsg').style.color = "#8C001A";
            }
            else {
                isValid = true;
            }

            return isValid;
        }
    </script>

</body>
</html>