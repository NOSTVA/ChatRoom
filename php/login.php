<?php
    session_start();
    include "config.php";
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        //check user's email and password matched
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user uniqe_idin other php file
            echo "success";

        }else
        {
            echo "email or password is incorrect";
        }

    }else{
        echo "All inputs are required!";
    }