<?php
include '../config/db.php';
include '../includes/header.php';
include '../includes/functions.php';

$posts = getPosts();
?>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<main>
    <h2>Admin Dashboard</h2>
    <a href="add_post.php" class="btn btn-add">Add New Post</a> <!-- Updated with btn-add class -->
    <table>
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td class="admin-actions">
                <a href="edit_post.php?id=<?= $post['id'] ?>" class="btn btn-edit">Edit</a> <!-- Updated with btn-edit class -->
                <a href="delete_post.php?id=<?= $post['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> <!-- Updated with btn-delete class -->
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php include '../includes/footer.php'; ?>
