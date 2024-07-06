<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем наличие данных в запросе
    if (isset($_POST['name'], $_POST['email'], $_POST['comment'])) {
        $name = escapeString($_POST['name']);
        $email = escapeString($_POST['email']);
        $comment = escapeString($_POST['comment']);

        $sql = "INSERT INTO comments (name, email, comment, created_at) VALUES ('$name', '$email', '$comment', NOW())";

        if (executeQuery($sql) === TRUE) {
            include 'load_comments_ajax.php';
        } else {
            echo "Ошибка при выполнении запроса: " . $conn->error;
        }
    } else {
        echo "Не все данные были переданы.";
    }
} else {
    echo "Доступ запрещен.";
}
?>
