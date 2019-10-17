<?php
include "../includes/config.php";
session_start();

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$email = mysqli_real_escape_string($conn, $email);
$pwd = mysqli_real_escape_string($conn, $pwd);

$email = htmlentities($email);
$pwd = htmlentities($pwd);

$sql = "select * from users where email='$email'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$r_pwd = $row['password'];

if(password_verify($pwd, $r_pwd)){

    $_SESSION['uniqid'] = $row['uniqid'];
    setcookie("cookie_uniqid", $_SESSION['uniqid'], time()+(86400 * 100), "/");

    header("Location: ../publish.php");
}
else {
    $_SESSION['error'] = "Username or Password is entered wrong";
    header("Location: ../login.php");
}

?>