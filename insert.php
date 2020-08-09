<?php
$servername = "localhost";
$database = "user_accounts";
$username = "root";
$passwd = "";


$firstname=$_POST["fname"];
$lastname=$_POST["lname"];
$number=$_POST["number"];
$email=$_POST["email"];
$password=$_POST["password"];

//db cn

$conn = mysqli_connect($servername, $username, $passwd, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";


$stmt = $conn->prepare("INSERT INTO users(firstname,lastname,email,phonenumber,password) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssis",$firstname,$lastname,$email,$number,$password);
echo "New record created successfully<br>";
$stmt->execute();
$stmt->close();
$conn->close();


?>