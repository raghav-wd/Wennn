<?php
include '../includes/config.php';

$event_poster_name = $_GET['event_poster'];

$sql = "DELETE FROM posts WHERE event_poster='$event_poster_name'";
$res = mysqli_query($conn, $sql);

if($res){
    header("Location: ../myevents.php");
}

?>