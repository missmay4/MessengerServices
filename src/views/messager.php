<?php
require_once '../entities/users.php';
require_once '../utils/sessionService.php';
require_once '../controller/messagerController.php';
require_once './utils.php';

SessionService::manageSession();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = new Messages(
        null,
        $_SESSION['user']->getID(),
        $_POST['destination'],
        $_POST['title'],
        $_POST['body'],
        null,
        null
    );
    MessagerController::sendMail($message);
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
                <div class="item">HOLA <?php echo strtoupper($_SESSION['user']->getUserName()); ?></div>
                <a class="item">Home</a>
                <a class="item">Profile</a>
                <a class="active item ">Messages</a>
                <div class="right menu">
                    <a id="jsLogoutButton" class="ui item">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="ui top attached tabular menu">
        <a class="item" data-tab="first">Messages</a>
        <a class="item" data-tab="second">Send Messages</a>
    </div>
    <div class="ui bottom attached tab segment" data-tab="first">
        <div class="ui two column very relaxed grid">
            <div class="column">
                <div id="jsTableMessage"></div>
            </div>
            <div class="column">
                <div id="jsMessageDetails"></div>
            </div>
        </div>
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
        <form>
            <br>
            Select Destination : <span id="jsUsersSelect"></span>
            <br><br>
            Title :<input type="text" name="title" id="title">
            <br><br>
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
            <br><br>
            <button id="jsSendMessageButton">Send</button>
            <button type="reset">Reset</button>
        </form>
    </div>
    <script type="application/javascript">
        $('.menu .item').tab();
    </script>
</body>

</html>