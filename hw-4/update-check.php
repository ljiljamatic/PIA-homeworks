<!DOCTYPE html>
<html>
<head>
    <title>UPDATE MOVIE</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
<div class="add" id="add">
  <form action="" method="post" class="b" enctype="multipart/form-data">
        <p class="start">Update movie data: </p>

        <label>Title:</label>
        <input type=text name="update_title" placeholder="Enter title:"><br>
        <button class="btn btn-dark" type="submit" name="button_update_title">Update title</button><br><br><br>

        <label>Description: </label>
        <input type="text" name="update_description" placeholder="Enter description:"><br>
        <button class="btn btn-dark" type="submit" class="btn btn-dark" name="button_update_description">Update description</button><br><br><br>

        <label>Image: </label>
        <input type="file" name="image">
        <button class="btn btn-dark" type="submit" name="button_update_image">Update image</button><br><br><br>

        <label>Year: </label>
        <input type="text" name="update_year" placeholder="Enter year:"><br>
        <button class="btn btn-dark" type="submit" name="button_update_year">Update year</button><br><br><br>

        <label>Production: </label>
        <input type="text" name="update_production" placeholder="Enter production:"><br> 
        <button class="btn btn-dark" type="submit" name="button_update_production">Update production</button><br><br><br>

        <label>Runtime: </label>
        <input type="text" name="update_runtime" placeholder="Enter runtime:"><br> 
        <button class="btn btn-dark" type="submit" name="button_update_runtime">Update runtime</button><br><br><br>

        <label>Directors: </label>
        <input type="text" name="update_directors" placeholder="Enter directors:"><br> 
        <button class="btn btn-dark" type="submit" name="button_update_directors">Update directors</button><br><br><br>

        <label>Scenarist: </label>
        <input type="text" name="update_scenarist" placeholder="Enter scenarist:"><br> 
        <button class="btn btn-dark" type="submit" name="button_update_scenarist">Update scenarist</button><br><br><br>

        <label>Stars: </label>
        <input type="text" name="update_stars" placeholder="Enter stars:"><br> 
        <button class="btn btn-dark" type="submit" name="button_update_stars">Update stars</button><br><br><br>

        <label>Genres: </label>
        <input type="text" name="update_genres" placeholder="Enter genres:"><br> 
        <button class="btn btn-dark" type="submit" name="button_update_genres">Update genres</button><br><br>

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
        header("Location: home2.php?success=Updated successful");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_title'])){
    $title = $_POST['update_title'];
    $sql = "UPDATE movies SET title = '$title' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Title is updated successfully");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_description'])){
    $description = $_POST['update_description'];
    $sql = "UPDATE movies SET description = '$description' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Description is updated successfully");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_image'])){
    $image = $_FILES['image']['name'];
    $target = "images/".basename($image);

    if(!move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "ERROR";
    }

    $sql = " UPDATE movies SET image_url = '$image' WHERE title = '$movie_title' ";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Image is updated successfully");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_production'])){
    $production = $_POST['update_production'];
    $sql = "UPDATE movies SET production = '$production' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Production is updated successfully");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_runtime'])){
    $runtime = $_POST['update_runtime'];
    $sql = "UPDATE movies SET runtime = '$runtime' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Runtime is updated successfully");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_directors'])){
    $directors = $_POST['update_directors'];
    $sql = "UPDATE movies SET directors = '$directors' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Directors are updated successfully");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_scenarist'])){
    $scenarist = $_POST['update_scenarist'];
    $sql = "UPDATE movies SET scenarist = '$scenarist' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Scenarist is updated successfully");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_stars'])){
    $stars = $_POST['update_stars'];
    $sql = "UPDATE movies SET stars = '$stars' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Stars are updated successfully");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

if(isset($_POST['button_update_genres'])){
    $genres = $_POST['update_genres'];
    $sql = "UPDATE movies SET genres = '$genres' WHERE title = '$movie_title'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: home2.php?success=Genres are updated successfully");
        exit(); 
    }else{
        header("Location: home2.php?error=Error");
        exit(); 
    }
}

?>