<?php
include '../config/db.php';
include '../includes/header.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    addPost($_POST['title'], $_POST['content'], $_POST['excerpt'], $_POST['category_id']);
    header("Location: admin.php");
}
?>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<main>
    <h2>Add New Post</h2>
    <form method="POST">
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Excerpt:</label>
        <input type="text" name="excerpt" required>
        <label>Content:</label>
        <textarea name="content" required></textarea>
        <button type="submit" class="btn">Add Post</button>
    </form>
</main>

<?php include '../includes/footer.php'; ?>
