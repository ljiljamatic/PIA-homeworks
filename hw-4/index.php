<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <img src = "imdb.png" class = "image"> 
    <form action="login.php" method="post" class="a">
        <p class="start">Sing-In</p>

        <?php if(isset($_GET['error'])){ ?>
             <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>

        <label>User Name or Email</label>
        <input type="text" name="uname" placeholder="User Name or Email"> 

        <label>Password </label>
        <input type="password" name="password" placeholder="Password"> 

        <button type="submit">Login</button>

        <a href="signup.php" class="ca">Create an account </a>
    </form>
</body>
</html>