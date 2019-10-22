<?php
require 'db-connect.php';
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="fancy-form.js" defer></script>
    <title>Scripture Prompt</title>
</head>

<body>
    <form class="fancy-form" action="insert_scripture.php" method="post">
        <div class="fancy-input">
            <input type="text" id="book">
            <div class="fancy-input-txt">Book</div>
        </div>
        <div class="fancy-input">
            <input type="text" id="chapter"chapter>
            <div class="fancy-input-txt">Chapter</div>
        </div>
        <div class="fancy-input">
            <input type="text" id="verse">
            <div class="fancy-input-txt">Verse</div>
        </div>
        <div class="fancy-input">
            <textarea id="content" cols="30" rows="10"></textarea>
            <div class="fancy-input-txt">Content</div>
        </div>
        
        <?php
            foreach ($db->query('SELECT topic_name 
            FROM topic;') as $row) {
                $topic_name = $row['topic_name'];
                echo "<input type='checkbox' name='$topic_name' value='$topic_name'>$topic_name<br>";
                
        ?>
        <div class="break"></div>
        <div class="fancy-btn">
            <input type="submit" value="Submit">
        </div>
    </form>
</body>
</html>