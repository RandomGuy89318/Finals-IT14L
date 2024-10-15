<?php 
    require '_functions.php';

    //get the taskId from the url parameter
    $taskId = $_GET['taskId'];

    if (isset($_POST['updatetask'])) {

        $taskName = $_POST['taskName'];
        $taskdescription = $_POST['taskdescription'];

        $request = updatetask($taskName, $taskdescription, $taskId);

        if ($request == true) {

            header("location: index.php?note=update");
        } else {
            header("location: index.php?note=error");
        }
    } else {
        header("location: index.php?note=invalid");
    }

?>