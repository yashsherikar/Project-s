<?php



$conn = mysqli_connect('localhost', 'root', '', 'burgershop');

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];



$que="INSERT INTO contact (name,email,number,message) VALUES ('$name','$email','$number','$message')";

$result = mysqli_query($conn, $que);

if ($result) {
    header('location:index29.html');
}

?>
