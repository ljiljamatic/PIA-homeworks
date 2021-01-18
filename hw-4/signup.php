<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <img src="imdb.png" class="image">
    <form action="signup-check.php" method="post" class="b">
        <p class="start">Sing Up</p>

        <?php if(isset($_GET['error'])){ ?>
             <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])){ ?>
             <p class="success"><?php echo $_GET['success'];?></p>
        <?php } ?>

        <label>Name and Surname</label>
        <input type="text" name="name" placeholder="Name and Surname"> 

        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"> 

        <label>Email</label>
        <input type="text" name="email" placeholder="Email"> 

        <label>Password </label>
        <input type="password" name="password" placeholder="Password"> 

        <label>Re_Password </label>
        <input type="password" name="re_password" placeholder="Re_password"> 

        <button type="submit">Sign Up</button>

        <a href="index.php" class="ca">Already have an account? </a>
    </form>
</body>
</html>