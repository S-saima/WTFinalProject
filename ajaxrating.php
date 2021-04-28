<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $complain = $_POST["complain"];
   
    $rating = $_POST["rating"];
   
	$conn = new mysqli("localhost", "user", "123", "finalproject1");

	if(empty($complain) ||empty($rating)) {
		echo "Fill up the form properly";
	}
	else {

		if($conn -> connect_error) {
			echo "Failed to connect database!";
		}
		else {

			$stmt = $conn -> prepare( "INSERT into feedback (ComplainBox, Rating) values (?, ?)");
			 mysqli_stmt_bind_param($stmt, "ss", $complain,  $rating );
     
     
			$status = $stmt -> execute();

			if($status) {
				echo "Your feedback is recorded!";
			}
			
			
		}
		$conn -> close();	
	}	
	
}

?>