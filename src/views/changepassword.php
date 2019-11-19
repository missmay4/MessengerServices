<?php
require_once '../controller/recoveryController.php';
require_once '../controller/userController.php';
require_once '../entities/users.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) &&  isset($_POST['newpassword']) && isset($_POST['newpassword2'])) {
       userController::modifyPassword($_GET['changeid'], $_POST['newpassword']);
       header('Location : login.php');
    }
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!$_GET['changeid']){
        header('Location: login.php');
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
<div class="ui grey secondary pointing menu">
    <a class="active item">
        Home
    </a>
</div>
<div class="ui grid">
    <div class="centered eight wide column">
        <h1>Change your password</h1>
        <form class="ui form" action="<?php $_SERVER['REQUEST_METHOD'] ?>" method="post">
            <div class="field required">
                <label for="username">User:</label>
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="field required">
                <label for="username">New password:</label>
                <input type="password" name="newpassword" placeholder="Password">
            </div>
            <div class="field required">
                <label for="password">Repeat password :</label>
                <input type="password" name="newpassword2" placeholder="Repate Password">
            </div>
            <hr>
            <div class="two ui buttons">
                <button class="grey ui button" type="submit">Submit</button>
                <button class="grey ui button" type="reset">Reset</button>
            </div>

        </form>
    </div>
</div>
<hr>

</body>

</html>