<?php 
session_start();
include "db_conn.php";
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
<nav class="navbar navbar-dark bg-secondary">
  <div class="container-fluid">
    <form class="navbar-form navbar-left" action="home.php" method="post">
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
        <div class = "row"><?= $row['runtime'] . " | " . $row['genres'] ?></div>
        </div>
        <div class="field">
          <img class="image" src="<?= $row['image_url'] ?>">
          <div class="description"><?= $row['description'] ?></div>
          <div class="element"><?= "Production: " . $row['production'] ?></div>
          <div class="element" ><?= "Directors: " . $row['directors'] ?></div>
          <div class="element"><?= "Scenarist: " . $row['scenarist'] ?></div>
          <div class="element"><?= "Stars: " . $row['stars'] ?></div>
        </div>
    </div>
</body>
</html>
<?php
}
?>