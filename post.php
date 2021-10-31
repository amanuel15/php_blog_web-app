<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <form method="POST">
        <input type="text" name="searchterm" placeholder="Search...">
    </form>

    <?php
        if(isset($_POST['searchterm'])) {
            $db = mysqli_connect("localhost","root","", "blog");
            $search = mysqli_real_escape_string($db,trim($_POST['searchterm']));
            $sql = "SELECT * FROM posts WHERE keywords LIKE '%$search%'";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)){
                $name = $row['body'];
                echo"$name<br/>";
            }
        }
    ?>


    
</body>
</html>