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
$email = $_SESSION["user_email_delete"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?> 
<h2>Delete <?php echo $email?></h2>
<p>Are you sure you want to delete you account?</p>
<form method = "post">
<input type = "submit" name="deleteconf" value="Delete Account">
</form>


<?php
if(isset($_POST['deleteconf'])){

    $sql= "delete from users where email = '$email'";
    //echo "To be delted";
    if($conn->query($sql)){
      echo "Your account has been deleted";

    }
   
}

?>

</body>

</html>
