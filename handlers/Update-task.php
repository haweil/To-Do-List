<?php
require "../Database/migration.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $taskId = $_POST['id'];
    $newTitle = $_POST['title'];
    $sql = "UPDATE `tasks` SET `title` = '$newTitle' WHERE `ID` = '$taskId'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['success'] = "Task updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update task." . mysqli_error($conn);;
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



<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form action="update-task.php" method="POST" class="form border p-2 my-5">
                <?php if (isset($_SESSION['success'])) : ?>
                <?php echo "pass";?>
                <?php endif;?>
                <?php if (isset($_SESSION['error'])) : ?>
                    <?php echo "fail";?>
                <?php endif;?>
                <input type="text" name="title" value="<?php echo$row['title']?? "" ; ?>" class="form-control my-3 border border-success" placeholder="add new todo">
                <input type="hidden" name="id" value="<?php  echo $row['ID'] ??   "" ; ?>">
                <input type="submit" value="Update" class="form-control btn btn-primary my-3">
            </form>
        </div>
    </div>
</div>
</body>
</html>
