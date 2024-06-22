<?php

/*******w******** 
    Name: Milan Cruz
    Date: 2024-06-20
    Description: Dynamic Blog Page - Show
 ****************/

require('connect.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Fetch the specific post by ID
$query = "SELECT id, title, timestamp, content FROM post WHERE id = :id";
$statement = $db->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Cruz's Car Blog - Full Post</a></h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="post.php">New Post</a></li>
        </ul>
        <div id="all_blogs">
            <div class="blog_post">
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <p>
                    <small>
                        <?= date("F j, Y, g:i a", strtotime($post['timestamp'])) ?> -
                        <a href="edit.php?id=<?= htmlspecialchars($post['id']) ?>">edit</a>
                    </small>
                </p>
                <div class="blog_content">
                    <?= nl2br(htmlspecialchars_decode($post['content'])) ?>
                </div>
            </div>
        </div>
        <div id="footer">
            Copywrong 2024 - No Rights Reserved
        </div>
    </div>
</body>

</html>