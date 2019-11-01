<?php
require_once '../entities/users.php';
require_once '../utils/sessionService.php';

SessionService::manageSession();
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
    <script src="./js/main.js" type="application/javascript"></script>


</head>

<body>
<hr>
<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui secondary pointing menu">
            <div class="item">Welcome <?php echo strtoupper($_SESSION['user']->getUserName()); ?></div>
            <a class="item">Home</a>
            <a class="item" href="profile.php">Profile</a>
            <a class="active item " href="messager.php">Messages</a>
            <div class="right menu">
                <a href="login.php" class="ui item">Logout</a>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="ui card">
    <div class="ui fluid image">
        <img src="img/profile_photo/" +<?php echo $_SESSION['user']->getUserPhoto(); ?>>
    </div>
    <div class="content">
        <a class="header"><?php echo $_SESSION['user']->getUserName(); ?></a>
        <div class="meta">
            <span class="date"><b>Last time visit: </b><?php echo $_SESSION['user']->getLastVisit(); ?></span>
            <span class="description"><b><?php echo $_SESSION['user']->getEmail(); ?></b></span>
        </div>
        <!-- <div class="description">
            Kristy is an art director living in New York.
        </div>
    </div>
    <div class="extra content">
        <a>
            <i class="user icon"></i>
            22 Friends
        </a>
    </div> -->
</div>

<!-- <div>
    <label for="name"><b>Name</b></label>
    <br>
    <p name="name"><?php echo $_SESSION['user']->getUserName(); ?></p>
    <label for="email"><b>Email</b></label>
    <br>
    <p name="email"><?php echo $_SESSION['user']->getEmail(); ?></p>
    <label for="lastTime"><b>Last time visit</b></label>
    <br>
    <p name="lastTime"><?php echo $_SESSION['user']->getLastVisit(); ?></p>
    <label for="photo"><b>Photo</b></label>
    <br>
    <p name="photo"><?php echo $_SESSION['user']->getUserPhoto(); ?></p>

</div> -->

</body>

</html>
