<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
?>
<h2>Welcome to Dashboard</h2>
<a href="add_note.php">Add Note</a> |
<a href="view_notes.php">View Notes</a> |
<a href="logout.php">Logout</a>
