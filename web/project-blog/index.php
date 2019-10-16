<?php
require 'db-queries.php';
require 'connect-db.php';
$db = get_db();
$page = "Home";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog - <?php echo $page ?></title>
</head>

<body>
    <h1><?php echo $page ?></h1>

    <?php
    foreach (getAllPosts($db) as $post) {
        $id = $post['post_id'];
        $title = $post['post_title'];
        echo "<a href=post.php?id=$id>$title</a><br>";
    }
    ?>
    
    <a href="index.php">Home</a>

</body>

</html>