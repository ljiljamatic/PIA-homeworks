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
        <button type="submit" name="button_update_description">Update description</button>

        <label>Image URL: </label>
        <input type="text" name="update_image" placeholder="Enter image URL:"><br>
        <button type="submit" name="button_update_image">Update image</button>

        <label>Year: </label>
        <input type="text" name="update_year" placeholder="Enter year:"><br>
        <button type="submit" name="button_update_year">Update year</button>

        <label>Production: </label>
        <input type="text" name="update_production" placeholder="Enter production:"><br> 
        <button type="submit" name="button_update_production">Update production</button>

        <label>Runtime: </label>
        <input type="text" name="update_runtime" placeholder="Enter runtime:"><br> 
        <button type="submit" name="button_update_runtime">Update runtime</button>

        <label>Directors: </label>
        <input type="text" name="update_directors" placeholder="Enter directors:"><br> 
        <button type="submit" name="button_update_directors">Update directors</button>

        <label>Scenarist: </label>
        <input type="text" name="update_scenarist" placeholder="Enter scenarist:"><br> 
        <button type="submit" name="button_update_scenarist">Update scenarist</button>

        <label>Stars: </label>
        <input type="text" name="update_stars" placeholder="Enter stars:"><br> 
        <button type="submit" name="button_update_stars">Update stars</button>

        <label>Genres: </label>
        <input type="text" name="update_genres" placeholder="Enter genres:"><br> 
        <button type="submit" name="button_update_genres">Update genres</button>

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

if(isset($_POST['button_update_title'])){
    $title = $_POST['update_title'];
    $sql = "UPDATE movies SET title = '$title' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Updated successful");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_title'])){
    $title = $_POST['update_title'];
    $sql = "UPDATE movies SET title = '$title' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Title is updated successfully");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_description'])){
    $description = $_POST['update_description'];
    $sql = "UPDATE movies SET description = '$description' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Description is updated successfully");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_image'])){
    $image = $_POST['update_image'];
    $sql = "UPDATE movies SET image_url = '$image' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Image is updated successfully");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_production'])){
    $production = $_POST['update_production'];
    $sql = "UPDATE movies SET production = '$production' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Production is updated successfully");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_runtime'])){
    $runtime = $_POST['update_runtime'];
    $sql = "UPDATE movies SET runtime = '$runtime' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Runtime is updated successfully");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_directors'])){
    $directors = $_POST['update_directors'];
    $sql = "UPDATE movies SET directors = '$directors' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Directors are updated successfully");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_scenarist'])){
    $scenarist = $_POST['update_scenarist'];
    $sql = "UPDATE movies SET scenarist = '$scenarist' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Scenarist is updated successfully");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_stars'])){
    $stars = $_POST['update_stars'];
    $sql = "UPDATE movies SET stars = '$stars' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Stars are updated successfully");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_genres'])){
    $genres = $_POST['update_genres'];
    $sql = "UPDATE movies SET genres = '$genres' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: update-check.php?success=Genres are updated successfully");
        exit(); 
    }else{
        header("Location: update-check.php?error=Error");
        exit(); 
    }
}

?>