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

<div class="ui two column very relaxed grid">
    <div class="column">
        <div class="ui card">
            <div class="ui fluid image">
                <img src="img/profile_photo/<?php echo $_SESSION['user']->getUserPhoto(); ?>">
            </div>
            <div class="content">
                <a class="header"><?php echo $_SESSION['user']->getUserName(); ?></a>
                <div class="meta">
                    <span class="description"><?php echo $_SESSION['user']->getEmail(); ?></span>
                    <br>
                    <span class="date"><b>Last time visit: </b><?php echo $_SESSION['user']->getLastVisit(); ?></span>
                </div>
            </div>
    </div>
    <div class="column">
        <form class="ui form">
            <div class="field">
                <label for="title">Change profile picture</label>
                <form action="" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <label for="title"><b>About you</b></label>
                    <label for="username">Age</label>
                    <input id="jsSenderMessage" type="text" name="username" id="username">
                    <label for="title">Home address</label>
                    <input id="jsTitleMessage" type="text" name="title" id="title">
                    <label for="title">Hobbies</label>
                    <input id="jsTitleMessage" type="text" name="title" id="title">

                    <input type="submit" value="Upload info" name="submit">
                </form>
            </div>
        </form>
    </div>
</div>




</body>

</html>
