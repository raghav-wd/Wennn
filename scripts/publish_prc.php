<?php
include "../includes/config.php";
session_start();

$event_title = $_SESSION['event_title'];
$event_date = $_SESSION['event_date'];
$event_url = $_SESSION['c_header'];
$event_details = $_SESSION['event_details'];
$poster_uniqid = $_SESSION['poster_uniqid'];
$u_uniqid = $_SESSION['uniqid'];
if(isset($_SESSION['chip_text_1']))
$chip_text_1 = $_SESSION['chip_text_1'];
else
$chip_text_1 = "";
if(isset($_SESSION['chip_text_2']))
$chip_text_2 = $_SESSION['chip_text_2'];
else
$chip_text_2 = "";
if(isset($_SESSION['chip_text_3']))
$chip_text_3 = $_SESSION['chip_text_3'];
else
$chip_text_3 = "";
if(isset($_SESSION['chip_text_4']))
$chip_text_4 = $_SESSION['chip_text_4'];
else
$chip_text_4 = "";


// $poster_dir = $_SESSION['poster_dir'];

$sql = "insert into posts(`event_title` ,`event_date` ,`event_url` ,`event_details`, `event_poster` , `chip_text_1`, `chip_text_2`, `chip_text_3`, `chip_text_4`, `uniqid`) value('$event_title', '$event_date','$event_url', '$event_details', '$poster_uniqid', '$chip_text_1', '$chip_text_2', '$chip_text_3', '$chip_text_4', '$u_uniqid')";
$res = mysqli_query($conn, $sql);



if($res){
    header("Location: ../home.php");
}
else {
    echo "<h1>Oops, We ran into some trouble</h1>";
}


?>