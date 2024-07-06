<?php
require_once 'db_connection.php';

$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = executeQuery($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);
        $comment = htmlspecialchars($row['comment']);
        $created_at = $row['created_at'];

        $formatted_time = date('d.m.Y H:i:s', strtotime($created_at));

        echo "<hr>";
        echo "<div class='comment'>";
        echo "<p><strong>$name</strong> ($email) - $formatted_time</p>";
        echo "<p>$comment</p>";
        echo "</div>";
    }
} else {
    echo "Пока нет комментариев.";
}
?>
