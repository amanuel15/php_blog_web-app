<?php

    include("includes/config.php");
    include("includes/db.php");

    $query = "SELECT * FROM categories";

    $categories = $db->query($query);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><i class="glyphicon glyphicon-camera"></i><span class="text-title">Photography Blog </span></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <form method="post" action="results.php" class="form-inline">
                    <div class="form-group" style="float: right; margin-top: 15px;">
                        <input type="text" name="searchterm" class="form-control" id="exampleInputName2" placeholder="Search...">
                    </div>
                </form>
            </div>
        </nav>
    </header>
    <ul class="nav nav-pills categories">
    <?php if(isset($_GET['category'])) { ?>
        <li><a href="index.php">Home </a></li>
    <?php }else { ?>
        <li class="active"><a href="index.php">Home </a></li>
    <?php } ?>

        <?php if($categories->num_rows > 0) { 
            while($row = $categories->fetch_assoc()){
                if(isset($_GET['category']) && $row['id'] == $_GET['category'] ){ ?>
        <li class="active"><a href="index.php?category=<?php echo $row['id']; ?>"><?php echo $row['text']; ?></a></li>
        <?php }else echo "<li><a href='index.php?category=$row[id]'>$row[text]</a></li>";
        } }?>
    </ul>