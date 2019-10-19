<?php
require 'utilities/db-queries.php';
require 'utilities/connect-db.php';
require 'components/generate-comments.php';
$db = get_db();

$id = $_GET['id'];

$post = getSinglePost($db, $id);
$title = $post['post_title'];
$date = $post['post_date'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require 'components/inject-head.php' ?>
    <title>Blog - <?php echo $title ?></title>
</head>

<body>

    <?php require 'components/navigation.php' ?>

    <main>
        <div class="content-container">

            <h2 class="post-title"><?php echo $title ?></h2>
            <div class="post-info"><?php echo "$date - $author"; ?></div>
            <div class="post-body"><?php echo $post['post_text'] ?></div>

            <div class="comment-box">
                <?php
                foreach (getPostComments($db, $id) as $comment) {
                    $commentId = $comment['comment_id'];
                    $user = $comment['first_name'] . " " . $comment['last_name'];
                    $date = $comment['comment_time'];
                    $text = $comment['comment_text'];
                    echo "
                    <div id=\"comment-$commentId\" class=\"comment\">
                       <div class=\"comment-details\">$user - $date</div>
                       <div class=\"comment-body\">$text</div>
                    </div>
                    <div class=\"children\">";
                    foreach (getSecondLevelComments($db, $commentId) as $comment) {
                        $commentId = $comment['id'];
                        $user = $comment['first_name'] . " " . $comment['last_name'];
                        $date = $comment['comment_time'];
                        $text = $comment['comment_text'];
                        echo "
                        <div id=\"comment-$commentId\" class=\"comment\">
                            <div class=\"comment-details\">$user - $date</div>
                            <div class=\"comment-body\">$text</div>
                        </div>";
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </main>

    <?php require 'components/footer.php' ?>

</body>

</html>