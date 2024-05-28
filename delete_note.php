<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $note_id = $_POST['note_id'];

    $sql = "DELETE FROM notes WHERE user_id = $user_id AND ID = $note_id";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
} else {
    echo "error: invalid request";
}
?>