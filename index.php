<?php
if (isset($_POST["task_name"]))
{
    require 'DB.php';
    extract($_POST);

        $sql = "INSERT INTO `task`(`task_id`, `task_name`, `date_todo`, `status`) 
                           VALUES (null,'$task_name','$date_todo','incomplete')";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        header("location:show.php");
    }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Task</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
<?php
require 'navbar.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Insert a task
                </div>
                <div class="card-body">

                    <form action="insert.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Task Name</label>
                            <input type="text" class="form-control" name="task_name" required>
                        </div>

                        <div class="form-group">
                            <label for="title">Date Todo</label>
                            <input type="date" class="form-control" name="date_todo" required>
                        </div>

                        <button class="btn btn-info btn-block">Save Task</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


</body>
