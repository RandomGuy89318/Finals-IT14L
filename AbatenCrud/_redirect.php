<?php
    require '_functions.php';

    if(isset($_POST['taskSearch'])){

        $taskSearch = $_POST['taskSearch'];

        if(empty($taskSearch)){
            header("Location:index.php?note=invalid");
        }else{
            header("Location: task_search.php?searchText=$taskSearch");
        }

    }else{
        header("Location:index.php?note=invalid");
    }   
?>