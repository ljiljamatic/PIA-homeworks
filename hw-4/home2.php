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
    <title>IMDb</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-dark bg-secondary">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home2.php">IMDb Admin</a>
      <ul class="nav navbar-nav">
      <li><a href="add.php">ADD MOVIE</a></li>
    </ul>
    </div>
    <form class="navbar-form navbar-left" action="home2.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for the movie: " name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>

    <form class="navbar-form navbar-left" action="home2.php" method="post">
      <div class="input-group">
        <form>
        <select name="search1" class="form-control">
           <option disabled selected>Select movie by genre: </option>
           <option>Action</option>
           <option>Comedy</option>
           <option>Romance</option>
           <option>Sci-Fi</option>
           <option>Horror</option>
           <option>Thriller</option>
           <option>Mystery</option>
           <option>Drama</option>
           <option>Animation</option>
           <option>Superhero</option>
           <option>Adventure</option>
           <option>Crime</option>
        </select>
       </form>
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    <form class="navbar-form navbar-right">
    <a class="navbar-brand" href="logout.php">Log Out</a>
    </form>
    <form class="navbar-form navbar-right">
    <div class="navbar-brand"><?php echo "Admin: ".$_SESSION['username']; ?></div>
    </form>
  </div>
</nav>

<?php
    function validate($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if(isset($_POST['search'])) {
    $search = validate($_POST['search']);
    $sql = "SELECT * FROM movies WHERE title LIKE '%$search%'";
    }
    else if(isset($_POST['search1'])) {
      $search = validate($_POST['search1']);
      $sql = "SELECT * FROM movies WHERE genres LIKE '%$search%'";
    }
    else{
      $sql = "SELECT * FROM movies";
    }
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){    
?>
    <div class="container">
        <div class="content">
            <img class="movie-image" src="<?php echo "images/".$row['image_url'] ?>">
            <div class="title">
            <?php echo "<a href='movie-admin.php?title=".$row['title']."'class='title'>"; ?>
            <p class="title"> <?php echo $row['title']; ?></p> <?php echo "</a>"; ?>
            </div>

            <?php echo "<a href='delete-check.php?title=".$row['title']."'>"; ?>
            <button id="btn1" class="btn btn-dark" type="submit">DELETE</button>
            <?php echo "</a>"; ?>
            <?php echo "<a href='update-check.php?title=".$row['title']."'>"; ?>
            <button class="btn btn-dark" type="submit">UPDATE</button>
            <?php echo "</a>"; ?>
        </div>
    </div>
</body>
</html>
<?php
}}
?>
