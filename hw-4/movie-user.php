<?php 
session_start();
include "db_conn.php";

if(!isset($_SESSION['isLogged'])){
  header("location:index.php"); //block if not logged in
}
if($_SESSION['admin'] == "admin"){
  header("location:home.php");  //back to admin page
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>IMDb Movie</title>
    <link rel="stylesheet" type="text/css" href="moviepage.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-dark bg-secondary">
    <div class="container-fluid">
      <form class="navbar-form navbar-left">
        <a class="navbar-brand" href="home.php">X</a>
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
      $title_movie = $row['title']; 
?>
    <div class="movie-container">
        <div class="movie-content">
        <div class = "movie-title"><?= $row['title'] . " (" . $row['year'] . ")" ?></div>
        <div class = "row"><?= $row['runtime'] . " min | " . $row['genres'] ?></div>
        </div>
        <div class="field">
          <img class="image" src="<?php echo "images/".$row['image_url'] ?>">
          <div class="description"><?= $row['description'] ?></div>
          <div class="element"><?= "Production: " . $row['production'] ?></div>
          <div class="element" ><?= "Directors: " . $row['directors'] ?></div>
          <div class="element"><?= "Scenarist: " . $row['scenarist'] ?></div>
          <div class="element"><?= "Stars: " . $row['stars'] ?></div><br>
          <form action="rating.php" method="POST"> 
              <?php $_SESSION['title'] = $row['title']; ?>
              <input class="form-control" type="number" name="rate_input" placeholder="Rate movie:"  min="1" max="10">
              <button name="rate_button"  class="form-control">Submit</button>
          </form><br>
          
<?php
    $sql2 = "SELECT * FROM rating_system WHERE rating_title = '$title_movie' ";
    $result2 = mysqli_query($conn, $sql2);
    $sum = 0;
    $count = 0;
    $average = 0;

    while($row = mysqli_fetch_assoc($result2)){
        $sum += $row['rate'];
        $count++;
    }

    if($count>0) {
    $average = $sum / $count;
    $average = round($average, 1); }   
    else {
    $average = 0;
    }

?>
          <div class="element"><?= "Average rate: " . $average ?></div>
          <div class="element"><?= "Number of rates: " . $count ?></div>
          <br>
        </div>
    </div>
   </div>


  </div>
</body>
</html>

<?php
}
?>