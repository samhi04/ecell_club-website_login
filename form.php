<?php
//echo"welcome to jumanji";
//echo "Input is ",print_r($_POST);
$email= $_POST["email"];
$password= $_POST["password"];

$server = "localhost";
$user = 'root';
$pass = "";
$db = 'ds_userdata';
// Create connection
$conn = new mysqli($server, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
$sql ="SELECT * from ds_userdata where email='$email' and password=$password";
//echo $sql;
//$sql = "SELECT * FROM `ds_userdata`";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
    //
    echo "<br> $email: $row[firstname] $row[lastname] login is successful";
    //     echo "<br> id: ". $row["userid"]. " Name: ". $row["firstname"]. " - Author: " . $row["lastname"] ;
      } }
else {
     echo "<br> $email not found";
}

$conn->close();

?>
