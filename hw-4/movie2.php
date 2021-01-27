<?php 
session_start();
include "db_conn.php";
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="movie2.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img src="imdb.png" width="63px" height="28px"></a>
    </div>
    <form class="navbar-form navbar-right">
    <a class="navbar-brand" href="login.php">Log Out</a>
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
        <div class = "row"><?= $row['runtime'] . " | " . $row['genres'] ?></div>
        <img class="image" src="<?= $row['image_url'] ?>">
        <div class="field">
          <div class="description"><?= $row['description'] ?></div>
          <div class="element"><?= "Production: " . $row['production'] ?></div>
          <div class="element" ><?= "Directors: " . $row['directors'] ?></div>
          <div class="element"><?= "Scenarist: " . $row['scenarist'] ?></div>
          <div class="element"><?= "Stars: " . $row['stars'] ?></div>
        </div>
    </div>
    </div>
</body>
</html>
<?php
}}
?>