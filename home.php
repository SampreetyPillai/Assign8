<html>
<head>


</head>
<body>


<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dblab8";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$email = $_SESSION["user_email"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?> 
<h2>Home Page</h2>
<form method = "post">
  <input type = "submit" value = "View First name" name = "FN">
  <input type = "submit" value = "View Last name" name = "LN">
  <input type = "submit" value = "View Email" name = "E">

</form>
  <form method = "post" action = "login.html">
  <input type = "submit" value = "Logout" name = "L" >
</form>

<?php

if(isset($_POST['FN'])){

  $sql = "select firstname from users where email = '$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo $row['firstname'];

}else if (isset($_POST['LN'])){

  $sql = "select lastname from users where email = '$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo $row['lastname'];

}else if (isset($_POST['E'])){
  echo $email;

} 

?>




</body>

</html>
