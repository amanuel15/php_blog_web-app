<?php include("includes/header.php");

    if(isset($_GET['category'])){
        $category = mysqli_real_escape_string($db, $_GET['category']);
        $query = "SELECT * FROM posts WHERE category='$category'";
    }else {
        $query = "SELECT * FROM posts";
    }

    $posts = $db->query($query);

?>
    <div class="container post">
    <?php if($posts->num_rows > 0) { 
        while($row = $posts->fetch_assoc()) {
    ?>
        <div class="row">
            <div class="col-md-6 post-title">
                <h1><a href="single.php?post=<?php echo $row['id'] ?>"><?php echo $row['title']; ?></a></h1>
                <p class="author"><strong><?php echo $row['author']; ?></strong> <span class="text-muted"><?php echo $row['date']; ?> </span></p>
            </div>
            
            <div class="col-md-6 col-md-offset-0 post-body">

                <?php $body = $row['body']; 
                    echo substr($body, 0, 800). "...";
                ?>

                <a href="single.php?post=<?php echo $row['id'] ?>" class="btn btn-primary">Read More</a>
            </div>
        </div>
        <?php } } ?>
    </div>
<?php include("includes/footer.php");?>