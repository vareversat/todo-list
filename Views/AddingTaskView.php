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

    <h2>Create a new task</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Content</th>
            <th>Date</th>


        </tr>
        </thead>
        <tbody>
        <form action="../../projetphptache/index.php" method="post">


            <tr>
                <td><input name="content" type="text" class="form-control" placeholder="Enter a content" autofocus></td>
                <td><input name="date" type="text" class="form-control"  placeholder="Enter the date"></td>
            </tr>
            <form action="../../projetphptache/index.php" method="post">
                <input name="taskListId" type="hidden" value="<?php echo $taskListId?>">
                <input name="taskListName" type="hidden" value="<?php echo $title?>">
                <button type="submit" name="action" value="addNewTask" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>   ADD</button>
            </form>


        </form>
        </tbody>
    </table>
</div>

</body>
</html>
