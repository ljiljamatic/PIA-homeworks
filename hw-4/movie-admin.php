<?php 
session_start();
include "db_conn.php";

if(!isset($_SESSION['isLogged'])){
  header("location:index.php"); //block if not logged in
}
if($_SESSION['admin'] == ""){
    header("location:home.php");  //back to user page
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>MOVIE PAGE</title>
    <link rel="stylesheet" type="text/css" href="moviepage.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-dark bg-secondary">
  <div class="container-fluid">
    <form class="navbar-form navbar-left" action="home.php" method="post">
    </form>
    <form class="navbar-form navbar-left">
    <a class="navbar-brand" href="home2.php">X</a>
    </form>
    <form class="navbar-form navbar-right">
    <a class="navbar-brand" href="logout.php">Log Out</a>
    </form>
  </div>
</nav>

<?php
    $title = mysqli_real_escape_string($conn, $_GET['title']);
    $sql = "SELECT * FROM movies WHERE title='$title'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){     
?>
    <div class="movie-container">
        <div class="movie-content">
        <div class = "movie-title"><?= $row['title'] . " (" . $row['year'] . ")" ?></div>
        <div class = "row"><?= $row['runtime'] . " min | " . $row['genres'] ?></div>
        </div>
        <div class="field">
          <img class="image" src="<?php echo "images/".$row['image_url'] ?>">
          <div class="description"><?= $row['description'] ?></div>
          <div class="element"><?= "PRODUCTION: " . $row['production'] ?></div>
          <div class="element" ><?= "DIRECTORS: " . $row['directors'] ?></div>
          <div class="element"><?= "SCENARIST: " . $row['scenarist'] ?></div>
          <div class="element"><?= "STARS: " . $row['stars'] ?></div>
        </div>
      </div>
     </div>
    </div>
</body>
</html>

<?php
}
?>