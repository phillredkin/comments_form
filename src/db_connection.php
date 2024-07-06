<?php
$host = 'db';
$username = 'root';
$password = 'root';
$database = 'test_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Ошибка соединения: " . $conn->connect_error);
}

function executeQuery($sql) {
    global $conn;
    $result = $conn->query($sql);
    return $result;
}

function escapeString($string) {
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}
?>
