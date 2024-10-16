<?php
    require '_functions.php';

    if(isset($_POST['createtask'])) {
        $taskName = $_POST['taskName'];
        $taskdescription = $_POST['taskdescription'];
        $taskstatus = $_POST['taskstatus'];
    
        $request = createtask($taskName, $taskdescription, $taskstatus);

        if($request == true) {
            header("location: index.php?note=added");
        } else {
            header("location: index.php?note=error");
        }
    } else {
        header("location: index.php?note=invalid");
    }
?>