<?php
require_once '../entities/users.php';
require_once '../controller/archiveController.php';
require_once '../controller/userController.php';
require_once '../utils/sessionService.php';
SessionService::manageSession();

userController::getUserList();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MessagerService</title>
    <link rel="stylesheet" href="./css/semantic.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/semantic.js"></script>

    <script src="./js/httpModule.js" type="application/javascript"></script>
    <script src="./js/users.js" type="application/javascript"></script>

</head>

<body>
<div class="ui grey secondary pointing menu">
    <a class="grey item">Welcome <?php echo strtoupper($_SESSION['user']->getUserName()); ?></a>
    <!-- <a class="item">Home</a> -->
    <a class="item" href="profile.php">Profile</a>
    <a class="item" href="messager.php">E-mail account</a>
    <a class="active item" href="companyUsers.php">Company users</a>
    <div class="right menu">
        <a href="login.php" class="ui item">Logout</a>
    </div>
</div>

<div class="ui four column very relaxed grid centered" id="joinUsers">

</div>

</body>

</html>
