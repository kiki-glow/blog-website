<?php
include '../config/db.php';
include '../includes/functions.php';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    deletePost($postId);
    header("Location: admin.php");
    exit();
} else {
    echo "Invalid post ID.";
}
?>


<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>