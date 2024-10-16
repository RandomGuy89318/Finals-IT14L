<?php 
    require '_functions.php';

    //get the taskId from the url parameter
    $taskId = $_GET['taskId'];

    if (isset($_POST['updatetask'])) {

        $taskName = $_POST['taskName'];
        $taskdescription = $_POST['taskdescription'];
        $taskstatus = $_POST['taskstatus'];

        $request = updatetask($taskName, $taskdescription, $taskstatus, $taskId);

        if ($request == true) {

            header("location: index.php?note=update");
        } else {
            header("location: index.php?note=error");
        }
    } else {
        header("location: index.php?note=invalid");
    }

?>