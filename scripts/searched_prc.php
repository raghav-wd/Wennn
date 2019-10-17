<?php

include "../includes/config.php";

$search = $_GET['search'];

$sql = "SELECT * FROM posts WHERE event_title LIKE '$search%'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

echo $row['id'];

$row = mysqli_fetch_assoc($res);

echo $row['id'];
// chip_text_1, chip_text_2, chip_text_3, chip_text_4
?>