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
    <div class="ui grid">
        <div class="ten wide column centered">
            <form class="ui form">
                <div class="fields">
                    <div class="field">
                        <label for="orderBy">OrderBy:</label>
                        <select name="orderBy" id="jsOrderByFriends">
                            <option value="age">Username</option>
                            <option value="age">Age</option>
                            <option value="age">Pais</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="orderBy">Search:</label>
                        <div class="ui icon input">
                            <input class="prompt" type="text" placeholder="Search Friends">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="ui grid">
        <div class="ten wide column centered">
        </div>
    </div>
</body>

</html>