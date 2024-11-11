<?php
include '../config/db.php';
include '../includes/header.php';
include '../includes/functions.php';

if (isset($_GET['id'])) {
    $post = getPostById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    updatePost($_GET['id'], $_POST['title'], $_POST['content'], $_POST['excerpt'], $_POST['category_id']);
    header("Location: admin.php");
}
?>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<main>
    <h2>Edit Post</h2>
    <form method="POST">
        <label>Title:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
        <label>Excerpt:</label>
        <input type="text" name="excerpt" value="<?= htmlspecialchars($post['excerpt']) ?>" required>
        <label>Content:</label>
        <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea>
        <button type="submit" class="btn">Update Post</button>
    </form>
</main>

<?php include '../includes/footer.php'; ?>
