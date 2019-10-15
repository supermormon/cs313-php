<?php
require 'db-connect.php';
?>


Scripture Details: <?php 
$book = $_GET["book"];
$chapter = $_GET["chapter"];
$verse = $_GET["verse"];

$query = 'SELECT book, chapter, verse, content IN scriptures
WHERE book = bk=:book_name
AND chapter = chapter=:chapter
AND verse = verse=:verse';
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $content = $row['content'];
}

echo "$book $chapter:$verse - $content";
?>