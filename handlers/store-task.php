<?php
session_start();
require "../Database/migration.php";
if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['title']) )  //check the method is post
{
    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));

    $sql="INSERT INTO `tasks`(`title`) values('$title')"; // insert into db
    $result = mysqli_query($conn,$sql);         // execute the sql
    if (mysqli_affected_rows($conn)==1){        // check the data is inserted or no
        $_SESSION['success']="Data inserted successfully"; //save the data in session
    }

    //redirection
    header("location:../index.php" );
}