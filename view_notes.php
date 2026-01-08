<?php
session_start();
include 'db.php';

$uid = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM notes WHERE user_id='$uid'");
?>

<h3>Your Notes</h3>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <p><?= $row['note']; ?></p>
<?php } ?>
