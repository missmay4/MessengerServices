<?php
require_once '../controller/loginController.php';
require_once '../entities/users.php';
require_once '../utils/sessionService.php';
SessionService::exterminateSession();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = new Users(
            null,
            $_POST['username'],
            $_POST['password'],
            null,
            null,
            $_POST['email']
        );
        LoginController::makeLogin($user);
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
    <script src="./js/checkRegisterButton.js" type="application/javascript"></script>
</head>

<body>

<div class="ui centered blue secondary pointing menu">
    <a class="active item">
        Messenger Services
    </a>
</div>
    <div class="ui grid">
        <div class="centered eight wide column">
            <h1>Register</h1>
            <form class="ui form" action="register.php" method="post">
                <div class="field required">
                    <label for="username">User</label>
                    <input type="text" name="username" id="usr" placeholder="Username">
                </div>
                <div class="field required">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="pswd" placeholder="Password">
                </div>
                <div class="field required">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="mail" placeholder="Email">
                </div>
                <div class="three ui buttons">
                    <button class="blue ui button" type="submit" id="but" disabled>Register</button>
                    <button class="blue ui button" type="reset">Reset</button>
                    <a class="blue ui button" href="login.php">Log In</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>