<?php
require ($_SERVER['DOCUMENT_ROOT'].'/Database/migration.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $taskId = $_POST['id'];
    $newTitle = $_POST['title'];
    $sql = "UPDATE `tasks` SET `title` = '$newTitle' WHERE `ID` = '$taskId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['success'] = "Task updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update task." . mysqli_error($conn);
    }

    header("Location: ../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $sql = "SELECT * FROM `tasks` WHERE `ID` = '$taskId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
