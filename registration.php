<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "registration";

// Create connection
$conn = new mysqli($servername, $username, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email=$_POST["email"];
$date=date('y-m-d');

$sql_query="SELECT * FROM user WHERE email='$email'";
$result= $conn->query($sql_query);
$row= mysqli_fetch_array($result);
if($row['email']!=NULL){
  echo "email has been taken";
}
else{
$sql="INSERT INTO user (email, name, password, reg_date)
VALUES
('".$_POST["email"]."','".$_POST["name"]."','".$_POST["password"]."','".$date."')";
    if($conn->query($sql)===TRUE){
        echo"the account is created successfully";
    }
    else{
        echo"something was wrong, please try again";
    }
}

$conn->close();
?>