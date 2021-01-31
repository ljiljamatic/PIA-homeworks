<?php
session_start();
include "db_conn.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOG IN</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php   
    if(isset($_POST['login'])){
        $login = $_POST['user'];
        $pass = $_POST['password'];
        $qry = "SELECT user_name, email, password, admin FROM users";

        $res = mysqli_query($conn, $qry);
        while($row=mysqli_fetch_array($res)){
            $username = $row['user_name'];
            $email = $row['email'];
            $password = $row['password'];
            $admin = $row['admin'];
            if($login == $row['user_name'] or $login == $row['email']){
                if($pass == $row['password']){
                    if($admin == "admin"){
                        header("location:home2.php");
                    }else{
                        header("location:home.php");
                    }
                    session_start();
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['admin'] = $row['admin'];
                    $_SESSION['isLogged'] = true;
                 }
            }else{
                //nesto ako ne radi
        }
    }
}

?>

<body>
    <img src = "imdb.png" class = "image"> 
    <form action="index.php" method="post" class="a">
      <p class="start">Sing-In</p>
      <label for="user">Email or username:</label>
      <input type="text" id="user" placeholder="Enter email or username" name="user" required>
      <label for="pwd">Password:</label>
      <input type="password" placeholder="Enter password" name="password" required>
      <button type="submit" name="login">Sing In</button>
      <a href="signup.php" class="ca">Create an account </a>
    </form>

    

</body>
</html>