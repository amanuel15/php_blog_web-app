<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>
    <form method="post" action="login.php" >
        <div class="input">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input">
            <button type="submit" class="btn" name="login">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>
</body>
</html>