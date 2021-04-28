<?php
session_start();
?>

	<?php 

	$username ="";
$usernameerr ="";

 if($_SERVER['REQUEST_METHOD'] == "POST") {

 if(empty($_POST['username'])) {
$usernameerr = "Please Fill up the Username!";
}
else
{
$username=$_POST['username'];
}

 
 

if($usernameerr ==""){
	?><table>
<tr>
			<th>Room No</th>
			<th>Username</th>
			<th>Booking Date</th>
			<th>Leaving Date</th>
			<th>Bed Type</th>
			<th>Approve</th>
		</tr>
		<?php
 $username = $_POST['username'];

	$hostname = "localhost";
    $username = "user";
    $password = "123";
    $dbname = "finalproject1";


	$conn1 = new mysqli($hostname, $username, $password, $dbname);

	if($conn1->connect_errno) {
		echo "Database Connection Failed!...";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else {

		if($_POST['username'] == $_SESSION['username']){

	$stmt = $conn1->prepare("SELECT * from bookingroom1 where UserName = ?");
		$stmt->bind_param("s", $p1);
		$p1 = $_POST['username'];
		$stmt->execute();
		$result = $stmt->get_result();

		echo "<br>";
		echo "<br>";
		if($result->num_rows > 0){

              while ($row = $result-> fetch_assoc()) {
		echo  "<tr><td>" .$row["roomNo"] ."<td>" . $row["UserName"] ."<td>" . $row["BookingDate"] ."<td>" . $row["LeavingDate"] ."<td>" . $row["BedType"]." <td>" . $row["Approve"]." <td>" ; 

}
}

else{

	echo "No result";
}





	}

	else{
		$usernameerr = "Input your own Username!";

	}
}

	$conn1->close();
}
}
 ?>

</table>
</body>
</html>


