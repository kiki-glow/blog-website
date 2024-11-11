<?php
include_once __DIR__ . '/../config/db.php';  // Adjusted path for accuracy

// Fetch all posts
function getPosts() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM posts ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch post by ID
function getPostById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Add a new post
function addPost($title, $content, $excerpt, $category_id) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO posts (title, content, excerpt, category_id) VALUES (:title, :content, :excerpt, :category_id)");
    $stmt->execute([
        'title' => $title,
        'content' => $content,
        'excerpt' => $excerpt,
        'category_id' => $category_id
    ]);
}

// Update an existing post
function updatePost($id, $title, $content, $excerpt, $category_id) {
    global $conn;
    $stmt = $conn->prepare("UPDATE posts SET title = :title, content = :content, excerpt = :excerpt, category_id = :category_id WHERE id = :id");
    $stmt->execute([
        'id' => $id,
        'title' => $title,
        'content' => $content,
        'excerpt' => $excerpt,
        'category_id' => $category_id
    ]);
}

// Delete a post
function deletePost($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->execute(['id' => $id]);
}

// Fetch comments by post ID
function getCommentsByPostId($postId) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at DESC");
    $stmt->execute([':post_id' => $postId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add a comment to a post
function addComment($postId, $author, $content) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO comments (post_id, author, content) VALUES (:post_id, :author, :content)");
    $stmt->execute([
        ':post_id' => $postId,
        ':author' => htmlspecialchars($author),
        ':content' => htmlspecialchars($content)
    ]);
}

?>
