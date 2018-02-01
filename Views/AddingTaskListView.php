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

    <form action="../../projetphptache/index.php" method="post">

        <button name="action" value="comeBack" type="submit" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-chevron-left"></span>     RETURN</button>
    </form>

    <form action="../../projetphptache/index.php" method="post">
        <button name="action" value="disconnection" type="submit" class="btn btn-primary">DISCONNECT     <span class="glyphicon glyphicon-log-out"></span></button>
    </form>
</div>

<div class="container">

    <h2>Create a new task list</h2>


    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <?php
            if($login != "public")
                echo "<th>Is Public</th>";
            ?>
        </tr>
        </thead>

        <tbody>

        <form action="../../projetphptache/index.php" method="post">
            <td><input name="title" type="text" class="form-control" placeholder="Enter a title" autofocus></td>
            <td><input name="date" type="text" class="form-control"  placeholder="Enter the date" ></td>

            <?php

            if($login != "public"){
                echo "<td><div class='choiceBox'>
                    <p>Yes </p><input checked='checked' name=\"isPublic\" value=\"0\" type=\"radio\" class=\"form-control\" id=\"exampleInputID\" >
                    <p>No </p><input name=\"isPublic\" value=\"1\" type=\"radio\" class=\"form-control\" id=\"exampleInputID\" ></div></td>";

            }
            else{
                echo "<input type='hidden' name='isPublic' value='yes'>";
            }
            ?>
            <input type='hidden' name='taskListName' value="<?php echo $title?>">
            <input type='hidden' name='taskListId' value="<?php echo $taskListId?>">
            <button type="submit" name="action" value="addNewTaskList" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>   ADD</button>
        </form>

        </tbody>
    </table>
</div>

</body>
</html>
