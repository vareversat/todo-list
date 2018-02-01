<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../projetphptache/Views/css/RegisterView.css" />

</head>
<body>

<div class="formContainer">

    <div class="formHimSelf">
        <form action="../../projetphptache/index.php" method="post">
            <div class="form-group">
                <label for="exampleInputID">ID</label>
                <input name="userId" type="text" class="form-control" id="exampleInputID"  placeholder="Enter ID" autofocus>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Repeat password</label>
                <input name="repeatedPassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button name="action" value="comeBack" type="submit" class="btn btn btn-info"><span class="glyphicon glyphicon-chevron-left"></span>     RETURN</button>
            <button name="action" value="createNewUser" type="submit" class="btn btn-success">REGISTER      <span class="glyphicon glyphicon-user"></span> </button>
        </form>
    </div>

</div>
</body>
</html>



