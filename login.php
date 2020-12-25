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
  $email = $_POST['email'];
  $password = $_POST['password'];


$sql="SELECT * FROM user WHERE email='$email' AND password='$password'";
$result= $conn->query($sql);
$row= mysqli_fetch_array($result);
if($row['email']=$email && $row['password']==$password){
  echo "welcome ".$row['name']."<br>";
$sql_query = "SELECT * FROM department";
$result = $conn->query($sql_query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "  Name: " . $row["name"]."<br>". "  description:  " . $row["description"]. "<br>";
  }
} else {
  echo "0 results";
}
}
else {
  echo "failed to login";
}

$conn->close();
?>