<?php
require 'utilities/db-queries.php';
require 'utilities/connect-db.php';
$db = get_db();
$page = "Home";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require 'components/inject-head.php' ?>
    <title>Blog - <?php echo $page ?></title>
</head>

<body>
    <?php require 'components/navigation.php' ?>


    <main>
        <div class="content-container">
            <h2 class="page-title">Blog</h2>
            <?php
            foreach (getAllPosts($db) as $post) {
                $id = $post['post_id'];
                $title = $post['post_title'];
                $img = $post['post_img'];
                $text = $post['post_text'];
                echo "    
                <div class=\"post-preview\">
                    <a href=\"post.php?id=$id\">
                        <h3>$title</h3>
                        <img src=\"\" alt=\"\">
                        <p>$text</p>
                        <div class=\"preview-fader\"></div>
                    </a>
                </div>";
            }
            ?>
        </div>
    </main>

    <?php require 'components/footer.php' ?>

</body>

</html>