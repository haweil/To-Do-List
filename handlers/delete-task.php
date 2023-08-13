<?php
session_start();
if (isset($_GET['id']))
{
    require "../Database/migration.php";
    $id = $_GET['id'];
    $sql= "DELETE FROM `tasks` WHERE `ID` = '$id'" ;
    $result = mysqli_query($conn,$sql) ;
    if (mysqli_affected_rows($conn)==1){        // check the data is inserted or no
        $_SESSION['success']="Data deleted successfully"; //save the data in session
    }
    else {
        $_SESSION['error']= "Data not exist";
    }
}
//redirection
header("location:../index.php" );

