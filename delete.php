<?php

include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tasks WHERE id = $id LIMIT 1";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    header("Location: index.php");
}