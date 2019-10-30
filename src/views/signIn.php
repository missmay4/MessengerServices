<?php
    require_once '../controller/loginController.php';
    require_once '../entities/users.php';    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if( isset($_POST['username']) &&  isset($_POST['password'])){
            LoginController::makeLogin($_POST['username'] , $_POST['password']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MessagerService</title>
</head>
<body>
<hr>
    <form action="./signIn.php" method="post">
        <label for="username">
            <span>User:</span>
            <input type="text" name="username" id="username">
        </label>
        <label for="password">
            <span>Password:</span>
            <input type="password" name="password" id="password">
        </label>
        <button type="submit">Send</button>
        <button type="reset">Reset</button>
    </form>
    <hr>
</body>
</html>