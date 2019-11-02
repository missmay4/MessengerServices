<?php
require_once '../controller/recoveryController.php';
require_once '../entities/users.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) &&  isset($_POST['email'])) {
        recoveryController::checkUserEmail($_POST['username'], $_POST['email']);
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
    <h4 class="ui header">Esto no funciona. Estamos trabajando en ello</h4>

</div>
<hr>

</body>

</html>