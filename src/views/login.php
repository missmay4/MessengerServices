<?php
require_once '../controller/loginController.php';
require_once '../entities/users.php';
require_once '../utils/sessionService.php';

SessionService::exterminateSession();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) &&  isset($_POST['password'])) {
        LoginController::checkLogin($_POST['username'], $_POST['password']);
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
    <link rel="stylesheet" href="./css/semantic.css">
    <script src="./js/semantic.js"></script>
</head>

<body>
    <!-- <hr>
    <div class="ui grid">
        <div class="sixteen wide column">
            <div class="ui secondary pointing menu">
                <a class="item">Home</a>
                <a class="item">Profile</a>
                <a class="item">Messages</a>
                <div class="right menu">
                    <a class="ui item">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <hr>-->
    <div class="ui grey secondary pointing menu">
        <a class="active item">
            Home
        </a>
    </div>
    <div class="ui grid">
        <div class="centered eight wide column">
            <h1>Log In</h1>
            <form class="ui form" action="./login.php" method="post">
                <div class="field required">
                    <label for="username">User :</label>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="field required">
                    <label for="password">Password :</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <a href="forgotpassword.php">Forgot password?</a>
                <hr>
                <div class="two ui buttons">
                    <button class="grey ui button" type="submit">Log In</button>
                    <a class="grey ui button" href="signIn.php">Register</a>
                </div>
            </form>
        </div>
    </div>
    <!-- <hr> -->

</body>

</html>