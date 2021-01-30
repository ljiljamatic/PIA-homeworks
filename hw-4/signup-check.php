<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['re_password']) && isset($_POST['name']) && isset($_POST['email'])) {
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $name = validate($_POST['name']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $email = validate($_POST['email']);

    $user_data = 'uname='. $uname . '&name' . $name;


    if(empty($uname)){
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    }else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    }else if(empty($re_pass)){
            header("Location: signup.php?error=Re_password is required&$user_data");
            exit();
    }else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
        exit();
    }else if(empty($email)){
        header("Location: signup.php?error=Email is required&$user_data");
        exit(); 
    }else if($pass !== $re_pass){
        header("Location: signup.php?error=Password does not match&$user_data");
        exit(); 
    }
    else{
        //hashing password seckanje
        $sql = "SELECT * FROM users WHERE user_name='$uname'";
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=User Name is taken&$user_data");
            exit(); 
        } else{
            $sql2 = "INSERT INTO users(user_name, password, name, email) VALUES('$uname', '$pass', '$name', '$email')";
            $result2 = mysqli_query($conn, $sql2);
            if($result2){
                header("Location: signup.php?success=Your account is created");
                exit(); 
            }else{
                header("Location: signup.php?error=Unknown error&$user_data");
                exit(); 
            }
    }

}

} else{
    header("Location: signup.php");
    exit();
}