<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    
    <form method="post" action="register.php">
        <div class="input">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $username; ?>">
        </div>
        <div class="input">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input">
            <label>Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input">
            <button type="submit" class="btn" name="register">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</body>
</html>