<?php session_start();

$conn = mysqli_connect("localhost", "root", "", "todoappphp");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// select data from database
$sql = "SELECT * FROM users";
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
    <title>all users</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">TODO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Tasks <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add-user.php">Add User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all-users.php">All Users</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="form-group  p-2 my-5">
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
                </div>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>user name</th>
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
                                <td><?php echo $row["name"]?></td>
                                <td>
                                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> </a>
                                    <a href="#" class="btn btn-info"><i class="fa-solid fa-edit"></i> </a>
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>