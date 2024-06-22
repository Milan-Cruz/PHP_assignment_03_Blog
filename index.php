<?php

/*******w******** 
    Name: Milan Cruz
    Date: 2024-06-20
    Description: Dynamic Blog Page - Index
 ****************/

require('connect.php');

// Fetch the 5 most recent posts
$query = "SELECT id, title, timestamp, content FROM post ORDER BY timestamp DESC LIMIT 5";
$statement = $db->prepare($query);
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Welcome to my Blog!</title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Cruz's Car Blog</a></h1>
        </div>
        <ul id="menu">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="post.php">New Post</a></li>
        </ul>
        <div id="all_blogs">
            <?php foreach ($posts as $post) : ?>
                <div class="blog_post">
                    <h2><a href="show.php?id=<?= htmlspecialchars($post['id']) ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
                    <p>
                        <small>
                            <?= date('F j, Y, g:i a', strtotime($post['timestamp'])) ?> -
                            <a href="edit.php?id=<?= htmlspecialchars($post['id']) ?>">edit</a>
                        </small>
                    </p>
                    <div class="blog_content">
                        <?php
                        $content = htmlspecialchars_decode($post['content']);
                        // Display an excerpt of the content (up to 200 characters)
                        echo nl2br(substr($content, 0, 200));
                        // If content exceeds 200 characters, show "Read more" link
                        if (strlen($content) > 200) {
                            echo '... <a href="show.php?id=' . htmlspecialchars($post['id']) . '">Read more</a>';
                        }
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div id="footer">
            Copywrong 2024 - No Rights Reserved
        </div>
    </div>
</body>

</html>