<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $note_id = $_POST['note_id'];
    $new_note = mysqli_real_escape_string($conn, $_POST['note']);

    $sql = "UPDATE notes SET note = '$new_note' WHERE user_id = $user_id AND ID = $note_id";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
} else {
    echo "error: invalid request";
}
?>