<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$uid = $_SESSION['user_id'];

// Delete note
if (isset($_GET['delete'])) {
    $note_id = $_GET['delete'];

    // delete only that user's note (security)
    mysqli_query($conn, "DELETE FROM notes WHERE id='$note_id' AND user_id='$uid'");
    header("Location: view_notes.php");
    exit();
}

// Fetch notes
$result = mysqli_query($conn, "SELECT * FROM notes WHERE user_id='$uid' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Notes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Your Notes</h2>
<a href="dashboard.php">⬅ Back to Dashboard</a>
<hr>

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div style='background:white;padding:10px;margin:10px 0;border-radius:8px;'>";
        echo "<p>" . htmlspecialchars($row['note']) . "</p>";
        echo "<small>Created: " . $row['created_at'] . "</small><br><br>";
        echo "<a href='view_notes.php?delete=" . $row['id'] . "' onclick=\"return confirm('Delete this note?')\">🗑 Delete</a>";
        echo "</div>";
    }
} else {
    echo "<p>No notes found. Add your first note!</p>";
}
?>

</body>
</html>
