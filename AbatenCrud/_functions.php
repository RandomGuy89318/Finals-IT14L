<?php 

    function dbconnection(){

        date_default_timezone_set('Asia/Manila');

        $dbconnection = new PDO('mysql:dbname=crud; host=localhost; charset=utf8mb4', 'root', '');

        $dbconnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $dbconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dbconnection;
    }

    function selecttasks(){
        $statement=dbConnection()->prepare("SELECT * FROM tbl_task Order By task_id ASC"); 
        $statement->execute();
        
        return $statement;
    }

    // create tasks

    function createtask($taskName, $taskdescription){
        $statement=dbConnection()->prepare("INSERT INTO  tbl_task (task_name, task_description,  task_created, task_status) 
                                                    VALUES (:task_name, :task_description, NOW(), :task_status)");

          // instead putting values directly to a query we use PDO variable as security measures                                          
        $statement->execute([
            'task_name' => $taskName,
            'task_description' => $taskdescription,
            'task_status' => 'Pending'
        ]);

        // confirm if the query is executed properly

        if ($statement){
            return true;
        }else{
            return false;
        }
    }

    // update tasks

    function updatetask($taskName, $taskdescription, $taskstatus, $taskId){
        $statement=dbConnection()->prepare("UPDATE 
                                                    tbl_task 
                                                    SET 
                                                        task_name = :task_name, 
                                                        task_description = :task_description, 
                                                        task_status = :taskstatus 
                                                    WHERE 
                                                        task_id = :task_id");

        $statement->execute([
            'task_name' => $taskName,
            'task_description' => $taskdescription,
            'task_id' => $taskId,
            'taskstatus' => $taskstatus
        ]);
        
        // confirm if the query is executed properly
        
        if ($statement){
            return true;
        } else{
            return false;
        }

    }

    // delete tasks
    
    function deletetask($taskId){
        $statement=dbConnection()->prepare("DELETE FROM 
                                                    tbl_task 
                                                    WHERE 
                                                    task_id = :task_id");
        $statement->execute([
            'task_id' => $taskId
        ]);
        
        // confirm if the query is executed properly
        
        if ($statement){
            return true;
        } else{
            return false;
        }
    }

    //get tasks
    function searchtasks($searchText){

        $statement=dbConnection()->prepare("SELECT 
                                            * 
                                            FROM
                                            tbl_task
                                            WHERE
                                            task_name LIKE
                                            :task_name
                                            Order By
                                            task_name
                                            ASC");
        $statement->execute([
            'task_name' => "%$searchText%"
        ]);     
        return $statement;
    }
    function searchtasksCount($searchText){

        $statement=dbConnection()->prepare("SELECT 
                                            * 
                                            FROM
                                            task
                                            WHERE
                                            task_name LIKE :task_name
                                            Order By
                                            task_name
                                            ASC");
                                            
        $statement->execute([
            'task_name' => "%$searchText%"
        ]);

        $count=$statement->rowCount();
        return $count;
    }
    //user registration
    function registeruser($username, $password ) {
        $statement = dbConnection()->prepare("INSERT INTO tbl_user (username, userpassword, role) 
                                                VALUES (:username, :userpassword, :role)");
    
        $password = password_hash($password, PASSWORD_DEFAULT); // Use $password
    
        $statement->execute([
            'username' => $username,
            'userpassword' => $password, // Correctly use the hashed password
            'role' => 'User'
        ]);
    
        return $statement ? true : false; // Simplified return statement
    }
    

?>