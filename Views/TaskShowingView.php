<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../projetphptache/Views/css/MainView.css" />
</head>
<body>

<div class="loginInfo">
    <form action="../../projetphptache/index.php" method="post">
        <button name="action" value="comeBack" type="submit" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-chevron-left"></span>     RETURN</button>
    </form>

    <form action="../../projetphptache/index.php" method="post">
        <input type='hidden' name='taskListId' value="<?php  echo $taskListId ?>"/>
        <input type='hidden' name='taskListName' value="<?php  echo $title ?>"/>
        <button name="action" value="addingTaskView" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>    NEW TASK</button>
    </form>

    <form action="../../projetphptache/index.php" method="post">
        <button name="action" value="disconnection" type="submit" class="btn btn-primary">DISCONNECT    <span class="glyphicon glyphicon-log-out"></span></button>
    </form>
</div>

<div class="container">
    <h1><?php  echo $title?></h1>
    <table class="table">
        <thead>
        <tr>
            <th>Content</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($tasks as $task){
            $openingTag = "";
            $closingTag = "";
            $disabled = "";

            if($task->getisComplete() == '1'){

                $openingTag = "<del><i>";
                $closingTag = "</del></i>";
                $disabled = "disabled";
            }

            echo "<tr>
                <td>".$openingTag.$task->getContent().$closingTag."</td>
                <td>".$openingTag.$task->getDate().$closingTag."</td>
                <td>
                <form action=\"../../projetphptache/index.php\" method=\"post\">
                
                    <input type='hidden' name='taskId' value=".$task->getTaskId()."/>
                    <input type='hidden' name='taskListId' value=".$taskListId."/>
                    <input type='hidden' name='taskListName' value=".$title."/>
                   
                    
                    <button type=\"submit\" name='action' value='deleteTask' class=\"btn btn-sm btn-danger\">DELETE</button>
                    <button type=\"submit\" name='action' value='completeTask' class=\"btn btn-sm btn-success ".$disabled."\">MARK AS COMPLETE</button>
                </form>
                </td></tr>";




        }
        ?>


        </tbody>
    </table>
</div>
</body>
</html>
