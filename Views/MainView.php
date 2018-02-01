<!DOCTYPE html>
<html lang="en">
<head>
    <title>TODO Tasks</title>
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
    <?php echo $loginString ?>
    <form action="../../projetphptache/index.php" method="post">
        <button name="action" value="addingTaskListView" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>    NEW TASKS LIST</button>
    </form>

    <form action="../../projetphptache/index.php" method="post">
        <button name="action" value="disconnection" type="submit" class="btn btn-primary">DISCONNECT     <span class="glyphicon glyphicon-log-out"></span></button>
    </form>
</div>

<div class="container">
    <h2>Tasks List</h2>
    <p>This show you all non completed tasks list</p>
    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <?php
            if($login != 'public')
                echo "<th>Is Public ?</th>";
            ?>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($taskLists as $taskList){
            echo "<tr>
                    <td>".$taskList->getTitle()."</td>
                    <td>".$taskList->getdate()."</td>";

            if ($login != 'public'){
                if($taskList->getIsPublic() == '1'){
                    echo "<td>YES</td>";
                }
                else{
                    echo "<td>NO</td>";
                }
            }

            echo "<td>
                    <form action=\"../../projetphptache/index.php\" method=\"post\">

                        <input type='hidden' name='taskListId' value=".$taskList->getId()."/>
                        <input type='hidden' name='taskListName' value=".$taskList->getTitle()."/>
                    
                        <button name=\"action\" value=\"viewTaskList\" type=\"submit\" class=\"btn btn-sm btn-primary\">SHOW</button>
                        <button name=\"action\" value=\"deleteTaskList\" type=\"submit\" class=\"btn btn-sm btn-danger\">DELETE</button>
                        
                    </form>
                    </td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
