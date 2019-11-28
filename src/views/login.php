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
    <title>Messenger Services</title>
    <link rel="stylesheet" href="./css/semantic.css">
    <script src="./js/checkLoginButton.js" type="application/javascript"></script>

</head>

<body>
    <div class="ui centered blue secondary pointing menu">
        <a class="active item">
            Messenger Services
        </a>
    </div>
    <div class="ui grid">
        <div class="centered eight wide column">
            <h1>Log In</h1>
            <form class="ui form" action="./login.php" method="post">
                <div class="field required">
                    <label for="username">User</label>
                    <input type="text" id="usr" name="username" placeholder="Username">
                    <div id="nameJS" class="ui pointing red basic label">
                        Please enter a value!
                    </div>
                </div>
                <div class="field required">
                    <label for="password">Password</label>
                    <input type="password" id="pswd" name="password" placeholder="Password">
                    <div id="paswJS" class="ui pointing red basic label">
                        Please enter a valid password!
                    </div>
                </div>
                <div class="field">
                    <a href="forgotpassword.php">Forgot password?</a>
                </div>
                <div class="two ui buttons">
                    <button class="blue ui button" id="but" type="submit" disabled>Log In</button>
                    <a class="blue ui button" href="register.php" name="regist">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>