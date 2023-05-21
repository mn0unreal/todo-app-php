<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "todoappphp");

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}



if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['title'])) {
    $title = trim(htmlspecialchars(htmlentities($_POST["title"])));
    // echo $title;
    $sql = "INSERT INTO tasks (title) VALUES ('$title')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['success'] = "New record created successfully";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

// redirection
header("Location: ../index.php");
