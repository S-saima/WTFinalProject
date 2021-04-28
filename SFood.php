<?php
session_start();
?>


<?php
$username = "";
$usernameerr = "";

 if($_SERVER['REQUEST_METHOD'] == "POST") {

 if(empty($_POST['username'])) {
$usernameerr = "Please Fill up the Username!";
}
else
{
$username=$_POST['username'];
}

if($usernameerr ==""){
 $username = $_POST['username'];
 

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

        $stmt1 = mysqli_prepare($conn1, "insert into food (UserName,SetMenu1,SetMenu2,SetMenu3) values (?, ?, ?, ?)");
        mysqli_stmt_bind_param ($stmt1, "ssss", $a1, $a2, $a3, $a4);
         
        $a1 = $_POST['username'];
        $a2 = $_POST['breakfast'];
        $a3 = $_POST['lunch'];
        $a4 = $_POST['dinner'];

        $res = mysqli_stmt_execute($stmt1);

        if($res) {
            echo "Data Inserted Successfully!";
        
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
<html lang="eng" dir="ltr">
<head>
<meta charset="utf-8">
<title>Food</title>
<link rel="stylesheet" href="SFood.css">
</head>
<body>


    <div class="gallery">

     <ul>
  <li><a href="FoodGallery.php">Food Gallery</a></li>
</ul>
    </div>
    <center>
    <form name="jsForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  method="POST">  
    <div class="food">
      <h4 style="color: black; font-family: cooper black;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h4>
        <h1>Select Food Item</h1>
        
         <p>UserName:</p>
<label for="username"></label>
<input type="text" name="username" id="username" value="<?php echo $username ?>">
<h5 style="color: #990012">
<?php echo $usernameerr; ?></h5>
<br>
        <h3>Set Menu 1</h3>
        <h4>
    <label class="container">Set Menu 1 - Porota,Sobji,daal
  <input type="checkbox" name="breakfast"  >
  <span class="checkmark"></span>
</label>


</h4>
<h3>Set Menu 2</h3>
<h4>
    <label class="container">Set Menu 2- Biriyani,Roast,Egg
  <input type="checkbox" name="lunch"  >
  <span class="checkmark"></span>
</label>


</h4>

<h3>Set Menu 3</h3>
<h4>
    
<label class="container">Set Menu 3- Rice,Beef,Daal
  <input type="checkbox" name="dinner" >
  <span class="checkmark"></span>
</label>
 

</h4>
 
   <br>
   <div class="order">
    <h2>
    <input type="submit" value="ORDER" name="submit">
    <p id="errorMsg"></p>
  </h2>
</div> 

 
</font>

</form>
</div>
</center>


 </header>


    <script>
        function validate() {
            var isValid = false;
            var username = document.forms["jsForm"]["username"].value;
            

            if(username == "" ) {
                document.getElementById('errorMsg').innerHTML = "Please fill up the food form properly";
                document.getElementById('errorMsg').style.color = "#8C001A";
            }
            else {
                isValid = true;
            }

            return isValid;
        }
    </script>
</body>
</head>
</html>

