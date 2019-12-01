<?php
require_once '../controller/recoveryController.php';
require_once '../entities/users.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) &&  isset($_POST['email'])) {
        recoveryController::sendRecoveryMail($_POST['username'] , $_POST['email']);
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
    <script>
    
    window.onload = function(){
        let msm = document.getElementById('mailJS');
        document.getElementById('btnSend').onclick = function(){
            msm.style.display = "block";
            setTimeout(() => {
                msm.style.display = "none";
            }, 1500);
        }
    }
    
    </script>

</head>

<body>

<div class="ui centered blue secondary pointing menu">
    <a class="active item">
        Messenger Services
    </a>
</div>
<div class="ui grid">
    <div class="centered eight wide column">
        <h1>Password Recovery</h1>
        <form class="ui form" action="" method="post">
            <div class="field required">
                <label for="username">User</label>
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="field required">
                <label for="password">Email</label>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="three ui buttons">
                <div id="mailJS" class="ui right pointing red basic label" style="display:none;">
                    Mail Sended !!            
                </div>
                <button id="btnSend" class="blue ui button" type="submit">Email me</button>
                <button class="blue ui button" type="reset">Reset</button>
                <a class="blue ui button" href="login.php">Log In</a>
            </div>

        </form>
    </div>
</div>

</body>

</html>