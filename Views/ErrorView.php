<!DOCTYPE html>
<html lang="en">
<head>
    <title>Error</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../projetphptache/Views/css/ErrorView.css" />

</head>
<body>

<div class="errorContainer">

    <div class="or">
        <h2>ERROR</h2>
    </div>

    <div class="content">
        <?php
        foreach ($dataViewError as $value)
            echo($value."</br>");
        ?>
    </div>

    <div class="backButton">
        <form action="../../projetphptache/index.php" method="post">
            <button name="action" value="comeBack" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>     RETURN</button>
        </form>
    </div>

</div>




</body>
</html>



