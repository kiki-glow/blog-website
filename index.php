<?php
include 'config/db.php';
include 'includes/header.php';
include 'includes/functions.php';

$posts = getPosts();
?>

<main>
    <h2>Blog Posts</h2>
    <?php foreach ($posts as $post): ?>
        <?php include 'templates/category_view.php'; ?>
    <?php endforeach; ?>
</main>

<?php include 'includes/footer.php'; ?>
