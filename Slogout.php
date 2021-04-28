<?php

 session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Log out </title>
</head>
<body>
<?php
unset($_SESSION['username']);
session_destroy();

 header("Location: SLogin.php ");
exit();


?>
</body>
</html>