<?php
    require '_functions.php';

    $taskId = $_GET['taskId'];

    if(isset($_POST['deletetask'])) {
    
        $request = deletetask($taskId);

        if($request == true) {
            header("location: index.php?note=added");
        } else {
            header("location: index.php?note=error");
        }
    } else {
        header("location: index.php?note=invalid");
    }
?>