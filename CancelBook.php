<?php
session_start();
?>

<?php
$username = $BookingDate = $LeavingDate = $BedType ="";
$usernameerr = $BookingDateerr = $LeavingDateerr = $BedTypeerr ="";

 if($_SERVER['REQUEST_METHOD'] == "POST") {

 if(empty($_POST['username'])) {
$usernameerr = "Please Fill up the Username!";
}
else
{
$username=$_POST['username'];
}

 if(empty($_POST['BookingDate'])) {
$BookingDateerr = "Please fill up the booking time!";
}

 else
{
$BookingDate=$_POST['BookingDate'];
}


 if($usernameerr ==""&&$BookingDateerr ==""){
 $username = $_POST['username'];
 $BookingDate=$_POST['BookingDate'];
 

	$hostname = "localhost";
	$username = "user";
	$password = "123";
	$dbname = "finalproject1";

	$conn1 = mysqli_connect($hostname, $username, $password, $dbname);
	if(mysqli_connect_error()) {
		echo " Database Connection Failed!...";
		echo "<br>";
		echo mysqli_connect_error();
	}
	else {
		if($_POST['username'] == $_SESSION['username']){

    $stmt1 = mysqli_prepare($conn1, "delete from bookingroom1 where UserName = ? and BookingDate =?");
		mysqli_stmt_bind_param($stmt1, "ss", $a1, $a2);
		$a1 = $_POST['username'];
        $a2 = $_POST['BookingDate'];
		$res = mysqli_stmt_execute($stmt1);

		if($res) {
			echo "Data Delete Successful!";
			header("Location: SButton.php ");
        exit();
		}
		else {
			echo "Failed to Delete Data.";
			echo "<br>";
	
	}
}
	else{

		$usernameerr="Input your own username";
	}
 }
 mysqli_close($conn1);
}

//setcookie($username,$password,time()+60);

 //if(isset($_COOKIE[$username])){

//$_SESSION['user'] = $username;

}


?>

<!DOCTYPE html>
<html>
<head >
<title>Cancel Book</title>
<link rel="stylesheet" type="text/css" href="CancelBook.css">

<body>

<div class="Cancel">
<center>
<h2 style="color: black;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h2>
<h1>Cancel Your Booking</h1>
<form name="jsForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><b>

<br>
<p>UserName:</p>
<label for="username"></label>
<input type="text" name="username" id="username" placeholder="Enter Your User Name">

<h5>
<?php echo $usernameerr; ?></h5>
<br>

<p>Date of Booking:</p>
<label for="BookingDate"></label>
<input type="Date" id="BookingDate" name="BookingDate"
value="<?php echo $BookingDate ?>">
<h5>
<?php echo $BookingDateerr; ?><br><br>
</h5>

    <br>
<input type="submit" value="Done">
<h3 style="font-family: cooper black"><p id="errorMsg"></p></h3>

 </div>
</font>
</head>
</form>
</center>

<script>
        function validate() {
            var isValid = false;
            var username = document.forms["jsForm"]["username"].value;
            var BookingDate = document.forms["jsForm"]["BookingDate"].value;
            

            if(username == "" || BookingDate == "") {
                document.getElementById('errorMsg').innerHTML = "Please fill up the booking cancel form properly";
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