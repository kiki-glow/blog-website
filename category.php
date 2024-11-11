<?php
include 'config/db.php';
include 'includes/header.php';
include 'includes/functions.php';

$categoryPosts = getPosts(); // You can modify this to fetch posts by category if needed
?>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<main>
    <h2>Posts by Category</h2>
    <?php foreach ($categoryPosts as $post): ?>
        <?php include 'templates/category_view.php'; ?>
    <?php endforeach; ?>
</main>

<?php include 'includes/footer.php'; ?>
