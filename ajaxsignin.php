<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dob = $_POST["dob"];
    $add = $_POST["add"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirmPass = $_POST["confirmPass"];
	$conn = new mysqli("localhost", "user", "123", "finalproject1");

	if(empty($fname)||empty($lname) ||empty($dob) || empty($add)||empty($phone)||empty($email)  || empty($username) || empty($password)|| empty($confirmPass)) {
		echo "Fill up the form properly";
	}
	else {

		if($conn -> connect_error) {
			echo "Failed to connect database!";
		}
		else {

			$stmt = $conn -> prepare("INSERT into userreg (FirstName,LastName,BirthDate,Address,Phone,Email,UserName,Password) values (?, ?, ?, ?, ?, ?, ?, ?)");
			 mysqli_stmt_bind_param($stmt, "ssssssss", $fname, $lname,  $dob , $add ,$phone, $email ,$username, $password);
     
			$status = $stmt -> execute();

			if($status) {
				echo "Successfully saved!";
			}
			else {
				echo "Username already existed!";
			}
			
		}
		$conn -> close();	
	}	
	
}

?>