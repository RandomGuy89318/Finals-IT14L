<?php
    require '_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Boostrap CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>

    <!-- Toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>


    <title>Task Manager</title>
</head>
<body class="bg-dark">

    <div class="container">

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Create / Retrieve / Update / Delete 
                        <button 
                        type="button"
                        class="btn btn-primary float-end"
                        data-bs-toggle="modal"
                        data-bs-target="#create">Create tasks</button>
                    </div>
                    <div class="card-body">
                        <form action="_redirect.php" method="post">
                            <div class="form-group">
                                <input
                                type="text"
                                class="form-control"
                                name="taskSearch"
                                id="taskSearch"
                                placeholder="Search Here ..."
                                autofocus
                                required>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Task</th>
                                        <th>Description</th>
                                        <th>Registered</th>
                                        <th>Status</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    
                                        $gettasks=selecttasks();

                                        while($task=$gettasks->fetch(PDO::FETCH_ASSOC)){
                                        
                                        ?>
                                <tr>
                                    <td class="text-center"><?=$task['task_id']?></td>
                                    <td class="text-center"><?=$task['task_name']?></td>
                                    <td class="text-center"><?=$task['task_description']?></td>
                                    <td class="text-center"><?=date("M d, Y g:i A", strtotime ($task['task_created']))?></td>
                                    <td class="text-center"><?=$task['task_status']?></td>
                                    <td class="text-center">
                                        <button 
                                        type="button"
                                        class="btn btn-info"
                                        data-bs-toggle="modal"
                                        data-bs-target="#edit_<?= $task['task_id']?>">Edit</button>
                                    </td>
                                    <td class="text-center">
                                    <button 
                                        type="button"
                                        class="btn btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#delete_<?= $task['task_id']?>">Delete</button>
                                    </td>
                                </tr>

                                <!--edit-->
                                <div class="modal fade" tabindex="-1" role="dialog" id="edit_<?=$task['task_id']?>">
                                        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit task - <?=$task['task_name']?></h5>

                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>

                                                        <form action="task_update.php?taskId=<?= $task['task_id']?>" method="post">

                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="" class="form-label">Task Name</label>
                                                                    <input 
                                                                    type="text" 
                                                                    class="form-control"  
                                                                    name="taskName" 
                                                                    id="taskName" 
                                                                    value="<?= $task['task_name']?>"
                                                                    required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="form-label">Description</label>
                                                                    <input 
                                                                    type="text" 
                                                                    class="form-control"  
                                                                    name="taskdescription" 
                                                                    id="taskdescription" 
                                                                    min="0" 
                                                                    step="0.01" 
                                                                    value="<?= $task['task_description']?>"
                                                                    required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="form-label">Status</label>
                                                                    <select class="form-control" name="taskstatus" id="taskstatus" min="0" step="0.01" value="<?= $task['task_status']?>"required>
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="In Progress">In Progress</option>
                                                                        <option value="Completed">Completed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="modal-footer">                                                          
                                                                <button type="submit" name="updatetask" id="updatetask"class="btn btn-primary">Save changes</button>
                                                            </div>
                                                </div>
                                                        </form>

                                        </div> 
                                </div>

                                <!--delete-->

                                <div class="modal fade" tabindex="-1" role="dialog" id="delete_<?=$task['task_id']?>">
                                        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Task - <?=$task['task_name']?></h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>

                                                        <form action="task_delete.php?taskId=<?= $task['task_id'] ?>" method="post">

                                                            <div class="modal-body">
                                                                
                                                                <p>Trying to delete <?=$task['task_name']?> ?</p>

                                                            </div>
                                                        
                                                            <div class="modal-footer">
                                                                <button type="submit" name="deletetask" id="deltetask"class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        </div> 
                                </div>
                                
                                <?php }?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
      <!--modals-->                                      
    <div class="modal fade" tabindex="-1" role="dialog" id="create">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add task</h5>

                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="task_create.php" method="post">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Task Name</label>
                            <input type="text" class="form-control"  name="taskName" id="taskName" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Description</label>
                            <input type="text" class="form-control"  name="taskdescription" id="taskdescription" min="0" step="0.01" required>
                        </div>
                    </div>
                
                    <div class="modal-footer">
                        <button type="submit" name="createtask" id="createtask"class="btn btn-primary">Create</button>
                    </div>
                    </div>
                </form>

            </div>                                
        </div>
    </div>

    <?php include '_scripts.php';?>
    <?php include '_alerts.php';?>
    
</body>
</html>