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
<h2>Update details <?php echo $email?></h2>
<p> First name: <?php echo $_SESSION["user_fname"];  ?></p>
<p> Last name: <?php echo $_SESSION["user_lname"];  ?></p>
<p> Password: <?php echo $_SESSION["user_pass"];  ?></p>

<h3> Update details: </h3>

<form method = "post" >
  <label>First name:</label><br>
  <input type="text" id="newfname" name="newfname" ><br>
  <label>Last name:</label><br>
  <input type="text" id="newlname" name="newlname" ><br>

  <label>Password:</label><br>
  <input type="text" id="newpass" name="newpass" ><br>

  <input type="submit" value="Submit" name = "Submit">


<input type="submit" name = "Delete" value  = "Delete" >
</form>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_POST['Submit'])){

  echo "Submit button";
    $newfname =  $_POST["newfname"];
    $newlname = $_POST["newlname"];
    $newpass = $_POST["newpass"];

    $sql = "update users set firstname = '$newfname' where email = '$email'";
    $result = $conn->query($sql);
    $sql = "update users set lastname = '$newlname' where email = '$email'";
    $result = $conn->query($sql);
    $sql = "update users set password = '$newpass' where email = '$email'";
    $result = $conn->query($sql);
    echo "Records have  been updated";
    
}else if(isset($_POST['Delete'])){
  echo "IN HERE";
  $_SESSION["user_email_delete"] = $email;
  header("Location: http://localhost/newfolder/delete.php");
}else{
  echo  "";
}
}


?>

</body>

</html>
