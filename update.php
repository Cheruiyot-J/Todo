<?php
//get the id
//retrieve the task
//display details
//update the task

if (isset($_GET["id"])){
    $id=$_GET ["id"];
    require 'DB.php';
    $sql="SELECT *from task where task_id=$id";
    $result =mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    extract($row);
}
if(isset($_POST["task_name"])){
    $task_name=$_REQUEST["task_name"];
    $date_todo=$_REQUEST["date_todo"];
    $status=$_REQUEST["status"];
    $id=$_REQUEST["id"];
    require 'DB.php';
    $sql="UPDATE task set task_name='$task_name', date_todo='$date_todo', status='$status' where task_id=$id";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
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
    <title>Update Movie</title>
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
                    Updating Task
                </div>
                <div class="card-body">

                    <form action="update.php" method="post">
                        <input type="hidden" name="id" value="<?=$id?>">

                        <div class="form-group">
                            <label for="title">Task Name</label>
                            <input value="<?=$task_name?>" type="text" class="form-control" name="task_name" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Date</label>
                            <input value="<?=$date_todo?>" type="date" class="form-control" name="date_todo" required>
                        </div>

                        <div class="form-group">
                            <label for="title">Status</label>
                            <select name="status"  class="form_control" required>
                                <option >Incomplete</option>
                                <option >Complete</option>
                            </select>
                        </div>
                        <button class="btn btn-info btn-block"> Update Task </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


</body>
