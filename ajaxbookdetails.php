
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<body>
  <table>
    
    <tr>
      <th>ID</th>
      <th>Room No</th>
      <th>Username</th>
      <th>Booking Date</th>
      <th>Leaving Date</th>
      <th>Bed Type</th>
      <th>Approve</th>
    </tr>
<?php 

 $conn = mysqli_connect("localhost","user","123","finalproject1");

if($_SERVER["REQUEST_METHOD"] == "GET") {

$a=$_SESSION['username'];
  $searchKey = $_GET['searchKey'];
  $sql = "SELECT * FROM bookingroom1 WHERE id = " . $searchKey;

  if(empty($searchKey)) {
    $sql = "SELECT * FROM bookingroom1 where UserName='$a' ";
  }
  
 $conn = mysqli_connect("localhost","user","123","finalproject1");


  if($conn -> connect_error) {
    echo "Failed to connect database!";
  }
  else {
    $result = $conn -> query($sql);

    if($result -> num_rows > 0) {
       while ($row = $result-> fetch_assoc()) {
            
echo  "<tr><td>".$row["id"] ."<td>" .$row["roomNo"] ."<td>" . $row["UserName"] ."<td>" . $row["BookingDate"] ."<td>" . $row["LeavingDate"] ."<td>" . $row["BedType"]." <td>" . $row["Approve"]." <td>" ; 
              }
              echo "<br>";

    } 
    else {
      echo "No record found!";
    }
  }
    
  $conn -> close();
}

?>
</table>

</body>
</head>
</html>



