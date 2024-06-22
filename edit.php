<?php

/*******w******** 
    Name: Milan Cruz
    Date: 2024-06-21
    Description: Dynamic Blog Page - Edit
 ****************/

require('authenticate.php');
require('connect.php');

$error = '';

// Check if ID is provided and numeric
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

// Retrieve post details from the database
$query = "SELECT id, title, content FROM post WHERE id = :id";
$statement = $db->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);

// Check if post exists
if (!$post) {
    header('Location: index.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (empty($title) || empty($content)) {
        $error = 'Please fill in both title and content.';
    } else {
        // Update post in the database
        $query = "UPDATE post SET title = :title, content = :content WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':content', $content);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            // Redirect to index.php after update
            header('Location: index.php');
            exit;
        } else {
            $error = "Error updating post.";
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
    <title>Cruz's Car Blog - Edit <?= htmlspecialchars($post['title']) ?></title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Cruz's Car Blog - Edit Post</a></h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="post.php">New Post</a></li>
        </ul>
        <div id="all_blogs">
            <form action="edit.php?id=<?= $post['id'] ?>" method="post">
                <fieldset>
                    <legend>Edit Blog Post</legend>
                    <p>
                        <label for="title">Title</label>
                        <input name="title" id="title" value="<?= htmlspecialchars($post['title']) ?>" />
                    </p>
                    <p>
                        <label for="content">Content</label>
                        <textarea name="content" id="content"><?= htmlspecialchars($post['content']) ?></textarea>
                    </p>
                    <?php if (!empty($error)) : ?>
                        <p class="error"><?= htmlspecialchars($error) ?></p>
                    <?php endif; ?>
                    <p>
                        <input type="hidden" name="id" value="<?= $post['id'] ?>" />
                        <input type="submit" name="command" value="Update" />
                        <input type="submit" name="command" value="Delete" onclick="return confirm('Are you sure you wish to delete this post?')" />
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