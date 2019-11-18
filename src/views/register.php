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
    <script>

        function checkData(){
            var user = document.getElementById('usr').value;
            var pass = document.getElementById('pswd').value;
            var mail = document.getElementById('mail').value;

            var regexUsr = /\w+/;
            var regexPass = /\w+\d+/;
            var regexMail = /[^@]+@[^\\.]+\..+/;

            console.log(regexMail.test(mail));

            if (regexUsr.test(user) && regexPass.test(pass) && regexMail.test(mail)){
                return false;
            } else {
                return true;
            }


        }

        function setUpFormulario(){
            var user = document.getElementById('usr');
            var pass = document.getElementById('pswd');
            var mail = document.getElementById('mail');

            user.onkeypress = function () {
                toggleSubmit(checkData());
            }
            pass.onkeypress = function () {
                toggleSubmit(checkData());
            }

            mail.onkeypress = function () {
                toggleSubmit(checkData());
            }

        }

        function toggleSubmit(state){
            //console.log(state);
            var boton = document.getElementById('but');
            boton.disabled = state;
        }

        window.onload = function () {
            setUpFormulario();
        }

    </script>
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
    <hr> -->
    <div class="ui grey secondary pointing menu">
        <a class="active item">
            Home
        </a>
    </div>
    <!-- <div class="ui segment">
        <p></p>
    </div> -->
    <!-- <div class="ui grid">
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
    <hr> -->
    <div class="ui grid">
        <div class="centered eight wide column">
            <h1>Register</h1>
            <form class="ui form" action="register.php" method="post">
                <div class="field required">
                    <label for="username">User:</label>
                    <input type="text" name="username" id="usr" placeholder="Username">
                </div>
                <div class="field required">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="pswd" placeholder="Password">
                </div>
                <div class="field required">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="mail" placeholder="Email">
                </div>
                <div class="three ui buttons">
                    <button class="grey ui button" type="submit" id="but" disabled>Register</button>
                    <button class="grey ui button" type="reset">Reset</button>
                    <a class="grey ui button" href="login.php">Log In</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>