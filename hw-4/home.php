<?php 
session_start();
include "db_conn.php";
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
       <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">IMDB</a>
            </div>
            <ul class="nav navbar-nav">
              <li id="logout" class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
            </ul>
          </div>
        </nav>


     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>

<?php
    $sql = "SELECT * FROM movies";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
        
?>
    <div class="container">
        <div class="content">
            <img class="movie-image" src="<?= $row['image_url'] ?>">
            <div class="title">
            <a class= "new" href="movie2.php" class="ca"><?= $row['title'] . " (" . $row['year'] . ")"; ?></a>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}}} else{
    header("Location: index.php");
    exit();
}
?>