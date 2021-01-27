<?php 
session_start();
include "db_conn.php";
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="home1.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img src="imdb.png" width="63px" height="28px"></a>
    </div>
    <form class="navbar-form navbar-left" action="home.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for the movie: " name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    <form class="navbar-form navbar-right">
    <a class="navbar-brand" href="login.php">Log Out</a>
    </form>
  </div>
</nav>

<?php
    if(isset($_POST['search'])) {
      function validate($data){
          $data = trim($data);
          $data = stripcslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
    $search = validate($_POST['search']);
    $sql = "SELECT * FROM movies WHERE title LIKE '%$search%'";
    }else{
    $sql = "SELECT * FROM movies";
    }

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
        
?>
    <div class="container">
        <div class="content">
            <img class="movie-image" src="<?= $row['image_url'] ?>">
            <div class="title">
            <?php echo "<a href='movie2.php?title=".$row['title']."'class='title'>"; ?>
            <p class="title"> <?php echo $row['title']; ?></p> <?php echo "</a>"; ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
  }}}
?>