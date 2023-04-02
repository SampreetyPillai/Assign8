
<html>
<head>


</head>
<body>


<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dblab8";


// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$email = $_POST["email"];
session_start();
$_SESSION["user_email"] = $email;
$sql = "select password from users where email = '$email'";
$result = $conn->query($sql);


if ($result->num_rows != 1){
echo "Incorrect password";
}else{

  $row = $result->fetch_assoc();

  if($_POST["pass"] == $row["password"]){
    echo "Logged in sucessfully";
    
    header('Location: http://localhost/newfolder/home.php');
    
  }else{
    echo "Invalid";
  }


}
?> 
<h2>Login Verification</h2>


</body>

</html>
