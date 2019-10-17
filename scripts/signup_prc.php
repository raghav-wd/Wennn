<?php
include "../includes/config.php";
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$phno = $_POST['phno'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];
$uniqid = "e".uniqid('', true);

if($pwd != $cpwd)$_SESSION['error'] = "Password Mismatched!";
if(strlen($pwd) < 8)$_SESSION['error'] = "Password should atleast contain 8 characters.";
if(strlen($phno) < 10)$_SESSION['error'] = "Invalid mobile no.!";

$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$phno = mysqli_real_escape_string($conn, $phno);
$pwd = mysqli_real_escape_string($conn, $pwd);

$name = htmlentities($name);
$email = htmlentities($email);
$phno = htmlentities($phno);
$pwd = htmlentities($pwd);

$sql = "SELECT email FROM users WHERE email='$email'";
$res = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($res);

if($num_rows > 0)$_SESSION['error'] = "Publisher already exist with this email!";


$pwd = password_hash($pwd, PASSWORD_BCRYPT);


if(isset($_SESSION['error']))
{
    header("Location: ../signup.php");
}
else
{
    $sql = "INSERT INTO users(`name`, `email`, `mobile`, `password`, `uniqid`) VALUES('$name', '$email', '$phno', '$pwd', '$uniqid')";
    $res = mysqli_query($conn, $sql);

    if($res) {
        header("Location: ../publish.php");
    }
}


?>