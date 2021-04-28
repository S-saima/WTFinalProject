<?php
//session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>profile</title>
</head>
<body style="height: 100vh;background-size: cover; background-image:url(sign1.jpg);"  >
<center>
	<?php


		$firstName = $lastName = $dob = $address = $phone = $email = $username = "";

		$firstNameErr = $lastNameErr = $dobErr = $addressErr = $phoneErr = $emailErr = $usernameErr = "";

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			if(empty($_POST['fname'])) {
				$firstNameErr = "Please fill up the firstname";
			}
			else {
				$firstName = $_POST['fname'];
			}

			if(empty($_POST['lname'])) {
				$lastNameErr = "Please fill up the lastname";
			}
			else {

				$lastName = trim($_POST['lname']);
				$lastName = htmlspecialchars($_POST['lname']);
			}

			if(empty($_POST['dob'])) {
				$dobErr = "Please fill up the Date of birth";
			}
			
			else {
				$dob = $_POST['dob'];
			}

			if(empty($_POST['add'])) {
				$addressErr = "Please fill up the address";
			}
			else {

				$address = $_POST['add'];
			}

			if(empty($_POST['phone'])) {
				$phoneErr = "Please fill up the phone number";
			}
			
			else {
				$phone = $_POST['phone'];
			}

			if(empty($_POST['email'])) {
				$emailErr = "Please fill up the email";
			}
			else {
				$email = $_POST['email'];
			}

			if(empty($_POST['username'])) {
				$usernameErr = "Please fill up the username";
			}
			else {

				$username = $_POST['username'];
			}

		

			if($firstNameErr == "" && $lastNameErr == "" && $dobErr == "" && $addressErr == "" && $phoneErr == "" && $emailErr == "" && $usernameErr == "") {
				
			

$Firstname = $_POST['fname'];
$Lastname = $_POST['lname'];
$Birthdate = $_POST['dob'];
$Gender = $_POST['Gender'];
$Address = $_POST['add'];
$PhoneNo = $_POST['phone'];
$Email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$Confirmpassword = $_POST['confirmPass'];

if($password == $Confirmpassword){


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

		$stmt1 = mysqli_prepare($conn1, "insert into userreg (FirstName,LastName,BirthDate,Gender,Address,Phone,Email,UserName,Password) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param ($stmt1, "sssssssss", $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9);
		$a1 = $_POST['fname'];
		$a2 = $_POST['lname'];
        $a3 = $_POST['dob'];
        $a4 = $_POST['Gender'];
        $a5 = $_POST['add'];
        $a6 = $_POST['phone'];
        $a7 = $_POST['email'];
        $a8 = $_POST['username'];
        $a9 = $_POST['password'];

		$res = mysqli_stmt_execute($stmt1);

		if($res) {
			echo "Data Inserted Successfully!";
		
        header("Location: SLogin.php ");
        exit();
		}
		else {
			echo "Failed to Insert Data.";
			echo "<br>";
			$usernameErr = "User Name is not available";
		}
	
	}

	mysqli_close($conn1);
	

}

 else {
 
 echo "Password does not match";
}
 }
}



?>

<center>
<h1 style="text-align:centre;">Create Your Account</h1>
</center>

<font color="black">
<form name="jssignin"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">

 <fieldset >

<b>
 <center>

<br>
<br>
<label for="fname">First Name:</label>
<input type="text" name="fname" id="fname" value="<?php echo $firstName ?>">
<p><?php echo $firstNameErr; ?></p>

<br>
<br>

<label for="lname">Last Name:</label>
<input type="text" name="lname" id="lname" value="<?php echo $lastName ?>">
<p><?php echo $lastNameErr; ?></p>
<br>
<br>

<label for="dob">Date of Birth: </label>
<input type="date" id="dob" name="dob"
value="<?php echo $dob ?>">
<p><?php echo $dobErr; ?></p>

 <br>
 <br>



<label for="Gender"  >Gender: </label>
<input type="radio" name="Gender" id="male" value="male" checked >
<label for="male">Male</label>

<input type="radio" name="Gender" id="female" value="female" >
<label for="female">Female</label>

 <br>
 <br>

 

<label for="add">Address: </label>
<input type="text" name="add" id="add" value="<?php echo $address ?>" >
<p><?php echo $addressErr; ?></p>

<br>
<br>


<label for="phone">Phone number: </label>
<input type="tel" id="phone" name="phone" value="<?php echo $phone ?>" >
<p><?php echo $phoneErr; ?></p>
<br>
<br>

 
<label for="email">Email: </label>
<input type="email" id="email" name="email" value="<?php echo $email ?>">
<p><?php echo $emailErr; ?></p>

<br>
<br>

<label for="username">User Name:</label>
<input type="text" name="username" id="username" value="<?php echo $username ?>">
<p><?php echo $usernameErr; ?></p>
<br>
<br>



<label for="password">Password:</label>
<input type="password" name="password" id="password" value="password" >

<br>
<br>


<label for="confirmPass">Confirm Password:</label>
<input type="password" name="confirmPass" id="confirmPass" value="confirmPass" >

<br>
<br>
</center>

 </fieldset></b>
<center>
<input style="color: blue; size: 1500px" type="submit" value="Sign In">
<p id="errorMsg"></p>

</center>

</form>
</font>

</center>

<script>
        function validate() {
            var isValid = false;
            var FirstName = document.forms["jssignin"]["fname"].value;
            var LastName = document.forms["jssignin"]["lname"].value;
            var BirthDate = document.forms["jssignin"]["dob"].value;
            var Gender = document.forms["jssignin"]["Gender"].value;
            var Address = document.forms["jssignin"]["add"].value;
            var Phone = document.forms["jssignin"]["phone"].value;
            var Email = document.forms["jssignin"]["email"].value;
            var UserName = document.forms["jssignin"]["username"].value;
            var Password = document.forms["jssignin"]["password"].value;
            var ConfirmPassword = document.forms["jssignin"]["confirmPass"].value;

            if(FirstName == "" || LastName == "" || BirthDate == "" || Gender == "" || Address == "" || Phone == "" || Email == "" || UserName == "" || Password == "" || ConfirmPassword == "") {
                document.getElementById('errorMsg').innerHTML = "<b>Please fill up the form properly to create your account";
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