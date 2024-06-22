<?php

/*******w******** 
    Name: Milan Cruz
    Date: 2024-06-20
    Description: Dynamic Blog Page - Post
 ****************/

require('authenticate.php');
require('connect.php');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (empty($title) || empty($content)) {
        $error = 'Please fill in both title and content.';
    } else {
        // Prepare and execute SQL query to insert new post
        $query = "INSERT INTO post (title, timestamp, content) VALUES (:title, NOW(), :content)";
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':content', $content);

        if ($statement->execute()) {
            // Redirect to index.php after successful insertion
            header('Location: index.php');
            exit;
        } else {
            $error = "Error inserting post.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>My Blog - New Post</title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Cruz's Car Blog - New Post</a></h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="post.php" class="active">New Post</a></li>
        </ul>
        <div id="all_blogs">
            <form action="post.php" method="post">
                <fieldset>
                    <legend>New Blog Post</legend>
                    <p>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" />
                        <!-- required removed -->
                    </p>
                    <p>
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="5"></textarea>
                        <!-- required removed -->
                    </p>
                    <?php if (!empty($error)) : ?>
                        <p class="error"><?= htmlspecialchars($error) ?></p>
                    <?php endif; ?>
                    <p>
                        <input type="submit" value="Create" />
                    </p>
                </fieldset>
            </form>
        </div>
        <div id="footer">
            Copywrong 2024 - No Rights Reserved
        </div>
    </div>
</body>

</html>