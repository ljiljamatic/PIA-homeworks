<?php
session_start();
include "db_conn.php";

if(!isset($_SESSION['isLogged'])){
    header("location:index.php"); //block if not logged in
}

if($_SESSION['admin'] == "admin"){
        header("location:home2.php");  //back to admin page
}

if(isset($_POST['rate_button'])) {
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $rate = validate($_POST['rate_input']);
    $user = $_SESSION['username'];
    $title = $_SESSION['title'];

    $sql = "INSERT INTO rating_system(rate, rating_user, rating_title) VALUES('$rate', '$user', '$title')";
    $result = mysqli_query($conn, $sql);

    if($result){
            header("Location: home2.php?success=Added successful");
            exit(); 
    }else{
            header("Location: home2.php?error=Error");
            exit(); 
    }


} else{
    header("Location: home2.php");
    exit();
}