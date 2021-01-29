<!DOCTYPE html>
<html>
<head>
    <title>UPDATE MOVIE</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="add" id="add">
  <form action="" method="post" class="b">
        <p class="start">Update movie data: </p>
        <label>Title</label>
        <input type=text name="update_title">
        <button type="submit" name="button_update_title">Update title</button>

        <label>Description: </label>
        <input type="text" name="update_description" placeholder="Enter description:"><br>

        <label>Image URL: </label>
        <input type="text" name="update_image placeholder="Enter image URL:"><br>

        <label>Year: </label>
        <input type="text" name="update4" placeholder="Enter year:"><br>

        <label>Production: </label>
        <input type="text" name="update5" placeholder="Enter production:"><br> 

        <label>Runtime: </label>
        <input type="text" name="update_runtime" placeholder="Enter runtime:"><br> 

        <label>Directors: </label>
        <input type="text" name="update_directors" placeholder="Enter directors:"><br> 

        <label>Scenarist: </label>
        <input type="text" name="update_scenarist" placeholder="Enter scenarist:"><br> 

        <label>Stars: </label>
        <input type="text" name="update_stars" placeholder="Enter stars:"><br> 

        <label>Genres: </label>
        <input type="text" name="update_genres" placeholder="Enter genres:"><br> 

    </form>
</div>

</body>
</html>

<?php
session_start();
include "db_conn.php";

$movie_title = $_GET['title'];
$sql = "SELECT * FROM movies WHERE title='$movie_title'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$title = $row['title'];
$description = $row['description'];
$image_url = $row['image_url'];
$production = $row['production'];
$runtime = $row['runtime'];
$directors = $row['directors'];
$scenarist = $row['scenarist'];
$stars = $row['stars'];
$genres = $row['genres'];

if(isset($_POST['button_update_title'])){
    $title = $_POST['update_title'];
    $sql = "UPDATE movies SET title = '$title' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Updated successful");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

?>