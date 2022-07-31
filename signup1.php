<?php
//echo"welcome to jumanji";
//echo "Input is ",print_r($_POST);
$email= $_POST["email"];
$password1= $_POST["password"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];

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
$sql ="SELECT * from ds_userdata where email='$email'";
//echo $sql;
//$sql = "SELECT * FROM `ds_userdata`";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
    //
    echo "<br> $email: $row[firstname] $row[lastname] this email is already registered";
    //     echo "<br> id: ". $row["userid"]. " Name: ". $row["firstname"]. " - Author: " . $row["lastname"] ;
      } }
else {
     $sql2= "INSERT INTO ds_userdata(firstname, lastname, email, password) VALUES('$firstname', '$lastname', '$email', '$password1')";
     //echo $sql2;
     if ($conn->query($sql2) === TRUE){
        echo "<br> user added successfully";
     }
     else{
        echo "Error: " . $sql2 . "<br>" . $conn->error;
     }
}

$conn->close();

?>
