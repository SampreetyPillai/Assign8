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

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connection established";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$confpass = $_POST["confpass"];
$sql= "INSERT INTO users(firstname, lastname, email,password) VALUES ('$fname','$lname', '$email', '$pass')";

echo $sql;


if($pass == $confpass){
  $key = 0;
  
  $chars = str_split($email);

  foreach ($chars as $char) {
    //echo $char."  ";
      if($char == '@'){
        $key+=1;
      }
  }

  if($key ==1 && $fname!="" && $lname!="" && $pass!=""){
    if ($conn->query($sql) === TRUE) {
      echo "record inserted successfully";
      $_SESSION["user_email"] = $email;
      $_SESSION["user_fname"] = $fname;
      $_SESSION["user_lname"] = $lname;
      $_SESSION["user_pass"] = $pass;
      header("Location: http://localhost/newfolder/update_delete.php");
      
  } else {
      echo "Error ";
  }

  }else{
    echo "invalid";
  }


}else{

echo "Password does not match";
}


?> 



</body>

</html>
