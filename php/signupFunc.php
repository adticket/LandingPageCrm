<?php

if(isset($_POST['submit'])){
    include_once 'connectDB.php';
    $first = mysqli_real_escape_string($connect, $_POST['first']);
    $last = mysqli_real_escape_string($connect, $_POST['last']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $uid = mysqli_real_escape_string($connect, $_POST['uid']);
    $pwd = mysqli_real_escape_string($connect, $_POST['pwd']);
    $admin = mysqli_real_escape_string($connect, $_POST['admin']);
  


if(empty($first) || empty($last) || empty($uid) || empty($email) || empty($pwd)){
    header("Location: signup.php?singup=fields-are-empty");
    echo 'fields must be field out';
    exit();      
}
else{
    if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
        header("Location: signup.php?singup=first-and-last-are-not-valide");
        echo 'first name and last name are not valide';
        exit();  
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: signup.php?EMAIL=empty");
            exit(); 
        }else{
            $sql = "SELECT * FROM users WHERE user_uid='$uid'";
            $result = mysqli_query($connect, $sql);
            $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    header("Location: signup.php");
                    exit();  
                }else{
                    $hashed = password_hash($pwd, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, admin_right) VALUES('$first', '$last', '$email', '$uid', '$hashed', '$admin');";
                    mysqli_query($connect, $sql);
                    echo 'You have successfuly created user';
                }


        }
    }
    
}




}else{
    header("Location: signup.php");
    exit();
}