<?php session_start();

$conn = mysqli_connect("localhost", "root", "", "todoappphp");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// select data from database
$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="handelers/store-task.php" method="POST" class="form border p-2 my-5">
                    <!-- success sessin alert  -->
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; ?>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif ?>
                    <!--// success sessin alert  //-->
                    <!-- errors sessin alert  -->
                <?php if (isset($_SESSION['errors'])) : ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['errors']; ?>
                    </div>
                    <?php unset($_SESSION['errors']); ?>
                <?php endif ?>
                    <!--// errors sessin alert  //-->
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["title"]?></td>
                                <td>
                                    <a href="handelers/delete-task.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> </a>
                                    <a href="update.php?id=<?php echo $row["id"]; ?>" class="btn btn-info"><i class="fa-solid fa-edit"></i> </a>
                                </td>
                                </tr>
                            <?php
                        }
                    } else {
                        echo "0 results";
                    }
?>
                        
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>