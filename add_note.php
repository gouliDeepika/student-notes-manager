<?php
session_start();
include 'db.php';

if (isset($_POST['add'])) {
    $note = $_POST['note'];
    $uid = $_SESSION['user_id'];

    mysqli_query($conn, "INSERT INTO notes(user_id,note)
    VALUES('$uid','$note')");
}
?>

<form method="POST">
    <textarea name="note" placeholder="Write your note"></textarea><br>
    <button name="add">Save</button>
</form>
