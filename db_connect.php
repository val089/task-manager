<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'task_manager_db';

$conn = mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);
if (!$conn) {
    echo "Connection failed!";
}
