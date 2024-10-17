<?php
    require '_functions.php';

    if(isset($_POST['createtask'])) {
        $taskName = $_POST['taskName'];
        $taskdescription = $_POST['taskdescription'];
    
        $request = createtask($taskName, $taskdescription);

        if($request == true) {
            header("location: index.php?note=added");
        } else {
            header("location: index.php?note=error");
        }
    } else {
        header("location: index.php?note=invalid");
    }
?>