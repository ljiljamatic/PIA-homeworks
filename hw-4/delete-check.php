<?php
session_start();
include "db_conn.php";
$title = $_GET['title'];
$sql = "DELETE FROM movies WHERE title='$title'";
$result = mysqli_query($conn, $sql);

if($result > 0){
    header("Location: home2.php?success=Deleted");
    exit(); 
}
else{
    header("Location: home2.php?error=Error");
    exit(); 
}
