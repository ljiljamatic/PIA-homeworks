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
    <h2 class="title"><?php echo $row['title']; ?></h2>
</body>
</html>
<?php
}}} else{
    header("Location: index.php");
    exit();
}
?>