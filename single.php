<?php include("includes/header.php");
    if(isset($_GET['post'])){
        $id = mysqli_real_escape_string($db, $_GET['post']);
        $query = "SELECT * FROM posts WHERE id='$id'";
    }

    $posts = $db->query($query);
?>

    <br>
    <?php if($posts->num_rows > 0) { 
        while($row = $posts->fetch_assoc()) {
    ?>
        <div class="row">
            <div class="col-md-6 post-title">
                <h1><?php echo $row['title']; ?></h1>
                <p class="author"><strong><?php echo $row['author']; ?></strong> <span class="text-muted"><?php echo $row['date']; ?> </span></p>
            </div>
            
            <div class="col-md-6 col-md-offset-0 post-body">

                <?php echo $row['body'];?>
                
            </div>
        </div>

        <?php } } ?>
        <?php
            if(isset($_POST['upload'])) {
                $db = mysqli_connect("localhost", "root", "", "blog");
                $text = $_POST['text'];
                $sql = "INSERT INTO comments (comment) VALUES ('$text')";
                mysqli_query($db, $sql);
            }
        ?>
        <div class="comment-area">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div class="form-group">
                    <lable>Comment</lable>
                    <textarea clos="60" rows="10" name="text" class="form-control"></textarea>
                </div>
                <button type="submit" name="upload" class="btn btn-primary">Post Comment!</button>
            </form>
        </div>
        
        <blockquote>comments</blockquote>
        <hr>
        <?php
            $db = mysqli_connect("localhost", "root", "", "blog");
            $sql = "SELECT * FROM comments";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)){
                echo"<div class='comment'>";
                    echo"<div class='comment-head'>";
                    echo"<a href='#'>Anonymous</a>";
                    echo"<img width='50' height='50' src='img/amanimg.jpg' />";

                    echo"</div>";
                    echo"<p>".$row['comment']."</p>";
                echo"</div>";
            }
        ?>

        
    </div>
<?php include("includes/footer.php");?>