<?php 
session_start();
include "db_conn.php";
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="full.css">
</head>

<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>

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
            <a class= "new" href="movie2.php" class="ca"><?= $row['title'] ?></a>
            <span class="blue"><?= $row['imdb_rating']; ?></span>
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