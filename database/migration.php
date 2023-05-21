<?php

// mysql connection
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    echo "connect error " . mysqli_connect_error();
}

// $sql = "DROP DATABASE todoappphp";

// CREATE DATABASE name todoappphp
$sql = "CREATE DATABASE IF NOT EXISTS todoappphp";
$conn = mysqli_connect("localhost", "root", "", "todoappphp");
// to execute a query
$result = mysqli_query($conn, $sql);

//create users tables

$sql = "CREATE TABLE IF NOT EXISTS users ( 
    `id` INT PRIMARY KEY AUTO_INCREMENT , 
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE
    
) ";
// to execute a query
mysqli_query($conn, $sql);
//create users tasks
$sql = "CREATE TABLE IF NOT EXISTS tasks(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(200) NOT NULL ,
    `user_id` INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES `users` (id)

) ";

// to execute a query
mysqli_query($conn, $sql);



mysqli_close($conn);
