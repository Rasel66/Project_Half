<?php
    require_once'../admin/dbcon.php';
    $id = base64_decode($_GET['id']);
    $query = "DELETE FROM `users` WHERE `id`='$id'";

    mysqli_query($link,$query);
    header("location:index.php?page=all_users");
?>