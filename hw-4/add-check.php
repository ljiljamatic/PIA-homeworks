<?php
session_start();
include "db_conn.php";


if(isset($_POST['title'])) {
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $title = validate($_POST['title']);
    $description = validate($_POST['description']);
    $image_url = validate($_POST['image']);
    $production = validate($_POST['production']);
    $runtime = validate($_POST['runtime']);
    $directors = validate($_POST['directors']);
    $scenarist = validate($_POST['scenarist']);
    $stars = validate($_POST['stars']);
    $genres = validate($_POST['genres']);
    $year = validate($_POST['year']);

    if(empty($title)){
        header("Location: add.php?error=Title is required");
        exit();
    }
    else{
        $sql = "SELECT * FROM movies WHERE title='$title'";
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result) > 0) {
            header("Location: add.php?error=The movie already exists");
            exit(); 
        }else{
            $sql2 = "INSERT INTO movies(title, description, image_url, production, runtime, directors, scenarist, stars, genres, year) VALUES('$title', '$description', '$image_url', '$production', '$runtime', '$directors', '$scenarist', '$stars', '$genres', $year)";
            $result2 = mysqli_query($conn, $sql2);
            if($result2){
                header("Location: home2.php?success=Added successful");
                exit(); 
            }else{
                header("Location: home2.php?error=Error");
                exit(); 
            }
    }

}

} else{
    header("Location: home2.php");
    exit();
}