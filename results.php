<?php include("includes/header.php");?>
    <br>
    <div class="sear">
    <?php
        if(isset($_POST['searchterm'])) {
            $db = mysqli_connect("localhost","root","", "blog");
            $search = mysqli_real_escape_string($db,trim($_POST['searchterm']));
            $sql = "SELECT * FROM posts WHERE keywords LIKE '%$search%'";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)){
                echo"<br/>";
                $name = $row['title'];
                echo "<h3><a href='single.php?post= $row[id]'>$name</a></h3>";
                echo substr($row['body'],0,300)."...";
                echo"<br/>";
            }
        }
    ?>
    </div>
    <style>
        .sear{
            margin: 50px;
            padding: 50px;
        }
        .sear a{
            size: 30px;
        }
    </style>
<?php include("includes/footer.php");?>