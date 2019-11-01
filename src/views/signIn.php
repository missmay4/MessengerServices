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
    <title>MessagerService</title>
    <link rel="stylesheet" href="./css/semantic.css">
    <script src="./js/semantic.js"></script>
</head>

<body>
    <hr>
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
    <hr>
    <div class="ui grid">
        <div class="centered eight wide column">
            <form class="ui form" action="./signIn.php" method="post">
                <div class="field required">
                    <label for="username">User:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="field required">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="field required">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="three ui buttons">
                    <button class="ui button" type="submit">Submit</button>
                    <button class="ui button" type="reset">Reset</button>
                    <a class="ui button" href="login.php">LogIn</a>
                </div>
            </form>
        </div>
    </div>
    <hr>
</body>

</html>