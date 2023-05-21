<?php

session_start();

if (isset($_GET['id'])) {
    // get id
    $id = $_GET['id'];

    $conn = mysqli_connect("localhost", "root", "", "todoappphp");

    if (!$conn) {
        echo "Connection failed: " . mysqli_connect_error();
    }

    // delete
    // $sql = "DELETE FROM tasks WHERE id=$id";
    $sql = "SELECT * FROM `tasks` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);

    if (!$row) {
        $_SESSION['errors'] = "data not exists";
    } else {
        $sql = "DELETE FROM `tasks` WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);
        $_SESSION['success'] = "data deleted successfully";
    }

// check
// if ($result) {
    //     $_SESSION['success'] = "has been deleted  successfully";
// }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// mysqli_close($conn);

// redirection
header("Location: ../index.php");
