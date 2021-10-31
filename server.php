<?php

    session_start();
    $username = "";
    $email = "";
    $errors = array();
    $db = mysqli_connect('localhost', 'root', '', 'blog');
    if (isset($_POST['register'])) {
        $username = ($_POST['username']);
        $email = ($_POST['email']);
        $password_1 =($_POST['password_1']);
        $password_2 = ($_POST['password_2']);
        
    if(empty($username)){
        array_push($errors, "Username is needed");
    }
    if(empty($email)){
        array_push($errors, "Email is needed");
    }
    if(empty($password_1)){
        array_push($errors, "Password is needed");
    }
    if ($password_1 != $password_2){
         array_push($errors, "Password must be the same");
    }
    if(count($errors) == 0){
        $password = md5($password_1);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are logged in";
        header('location: index.php'); //where u want

    }

}
if (isset($_POST['login'])){
        $username = ($_POST['username']);
        $password = ($_POST['password']);
        
    if(empty($username)){
        array_push($errors, 'Username is needed');
    }
    if(empty($password)){
        array_push($errors, "Password is needed");
    }
    if (count($errors)==0){
        $password = md5($password);
        $query = "SELECT * FROM users where username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result)==1){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are logged in";
            header('location: index.php'); //where u want

        }else{
            array_push($errors, "Wrong username or password");
            header('location: indoo.php');
        }
    }
}

if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: indoo.php');
}   
?>