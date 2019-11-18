<?php
require_once '../entities/users.php';
require_once '../utils/sessionService.php';
require_once '../controller/messagerController.php';
require_once './utils.php';

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
    <!-- <hr>
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
    <hr> -->
    <div class="ui grey secondary pointing menu">
        <a class="grey item">Welcome <?php echo strtoupper($_SESSION['user']->getUserName()); ?></a>
        <!-- <a class="item">Home</a> -->
        <a class="item" href="profile.php">Profile</a>
        <a class="active item " href="messager.php">E-mail account</a>
        <div class="right menu">
            <a href="login.php" class="ui item">Logout</a>
        </div>
    </div>




    <div class="ui top attached tabular menu">
        <a class="grey item active" data-tab="first">Inbox</a>
        <a class="grey item" data-tab="second">Send Messages</a>
    </div>
    <div class="ui bottom attached tab segment" data-tab="first">
        <div class="ui two column very relaxed grid">
            <div class="column">
                <div class="centered" id="jsTableMessage"></div>
            </div>
            <div class="column">
                <form class="ui form">
                    <div class="field">
                        <label for="sender">Sender:</label>
                        <input id="jsSenderMessage" type="text" name="title" id="title" disabled>
                    </div>
                    <div class="field">
                        <label for="title">Title :</label>
                        <input id="jsTitleMessage" type="text" name="title" id="title" disabled>
                    </div>
                    <div class="field">
                        <label for="body">Body :</label>
                        <textarea id="jsBodyMessage" name="body" id="body" cols="30" rows="10" disabled></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
        <form class="ui form">
            <div class="field">
                <label for="destination">Select Destination :</label>
                <span id="jsSendUsersSelect"></span>
            </div>
            <div class="field">
                <label for="title">Title :</label>
                <input id="jsSendTitleMessage" type="text" name="title" id="title">
            </div>
            <div class="field">
                <label for="body">Body :</label>
                <textarea id="jsSendBodyMessage" name="body" id="body" cols="30" rows="10"></textarea>
            </div>
            <div class="two ui buttons">
                <button class="grey ui button" type="button" id="jsSendMessageButton">Send</button>
                <button class="grey ui button" type="reset">Reset</button>
            </div>
        </form>
    </div>
    <script type="application/javascript">
        $('.menu .item').tab();
    </script>
</body>

</html>