<?php
include 'config/db.php';
include 'includes/header.php';
include 'includes/functions.php';

if (isset($_GET['id'])) {
    $post = getPostById($_GET['id']);
} else {
    echo "Post ID not specified!";
    exit;
}

// If post not found, show an error message
if (!$post) {
    echo "Post not found!";
    exit;
}

// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['author'], $_POST['content'])) {
    $author = $_POST['author'];
    $content = $_POST['content'];
    addComment($_GET['id'], $author, $content);
}

// Fetch comments for this post
$comments = getCommentsByPostId($_GET['id']);
?>

<main>
    <?php include 'templates/post_view.php'; ?>

    <!-- Comments Section -->
    <section class="comments">
        <h3>Comments</h3>

        <!-- Display existing comments -->
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> - <?= $comment['created_at'] ?></p>
                <p><?= htmlspecialchars($comment['content']) ?></p>
            </div>
        <?php endforeach; ?>

        <!-- Comment Form -->
        <h4>Leave a Comment</h4>
        <form action="post.php?id=<?= $_GET['id'] ?>" method="POST">
            <input type="text" name="author" placeholder="Your Name" required>
            <textarea name="content" placeholder="Your Comment" required></textarea>
            <button type="submit" class="btn">Submit Comment</button>
        </form>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
