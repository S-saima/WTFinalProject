<?php
session_start();
?>

<?php
$username = $FacilityType ="";
$usernameerr = $FacilityTypeerr = "";

 if($_SERVER['REQUEST_METHOD'] == "POST") {

 if(empty($_POST['username'])) {
$usernameerr = "Please Fill up the user name!";
}
else
{
$username=$_POST['username'];
}


if(empty($_POST['FacilityType'])) {
$FacilityTypeerr = "Please fill up the facility type!";
}

 else
{
$FacilityType=$_POST['FacilityType'];
}

if($usernameerr ==""&&$FacilityTypeerr ==""){
 $username = $_POST['username'];
 $FacilityType=$_POST['FacilityType'];
 


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

        $stmt1 = mysqli_prepare($conn1, "insert into facility (UserName,FacilityType) values (?, ?)");
        mysqli_stmt_bind_param ($stmt1, "ss", $a1, $a2);
        $a1 = $_POST['username'];
        $a2 = $_POST['FacilityType'];
       

        $res = mysqli_stmt_execute($stmt1);

        if($res) {
            echo "Data Inserted Successfully!";
        //$_SESSION['username'] = $Lastname;
        header("Location: SButton.php ");
        exit();
        }
        else {
            echo "Failed to Insert Data.";
            
        }
    
    }
    else{

        $usernameerr="Input your own username";
    }
 }
 mysqli_close($conn1);
 
}

}

?>


<!DOCTYPE html>
<html>
<head>
<title>Facility</title>
</head>
<body  background= "black.jpg" >
  <font size="4"; color="white">
  
  <?php
//echo " ". $_SESSION['username'];
?>
<center>
  <h4 style="color: white; font-family: cooper black;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h4>
 
  <h2>Any Type Of Facility Is Available For You</h2>
   <table border="5">
    <tr>
      <td>
        <img src="swim.jpg" width="240" height="220">
      </td>
      <td>
        <img src="park.jpg" width="240" height="220">
      </td>
      <td>
        <img src="gym.jpg" width="240" height="220">
      </td>

    </tr>
    
    <tr style="color: white; font-size : 15px;">
      <td>$10 BDT</td>
      <td>$20 BDT</td>
      <td>$30 BDT</td>
      

    </tr>
    
  </table>
<form name="jsForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><b>


<p>UserName:</p>
<label for="username"></label>
<input type="text" name="username" id="username" value="<?php echo $username ?>">
<h5 style="color: #8C001A">
<?php echo $usernameerr; ?></h5>
<br>

  
  <select name="FacilityType">
    <option selected disabled="" >Select Facility Type:</option>
    <option value="Swimming Pool">Swimming Pool</option>
    <option value="Car Parking">Car Parking</option>
    <option value="Gym">Gym</option>
   
    </select>
<h5 style="color: #8C001A">
<?php echo $FacilityTypeerr; ?><br>
</h5>

  <font>
  
  
  <center>
    <input style="font-family: 'Cooper Black'; color: black; font-size : 15px; width: 200px; height: 30px;" type="submit" value="Send Request">
    <p id="errorMsg"></p>

  </center>
</form>
</font>

<script>
        function validate() {
            var isValid = false;
            var username = document.forms["jsForm"]["username"].value;
            var FacilityType = document.forms["jsForm"]["FacilityType"].value;
            

            if(username == "" || FacilityType == "" ) {
                document.getElementById('errorMsg').innerHTML = " <b>Please fill up the facilities form properly";
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