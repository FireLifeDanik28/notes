<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    if (empty($note)) {
        echo "error: note is empty";
        exit;
    }

    $sql = "INSERT INTO notes (note, user_id) VALUES ('$note', $user_id)";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
} else {
    echo "error: invalid request";
}
?>