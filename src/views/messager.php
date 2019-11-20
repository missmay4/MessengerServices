<?php
require_once '../entities/users.php';
require_once '../utils/sessionService.php';
require_once '../controller/messagerController.php';
require_once './utils.php';

SessionService::manageSession();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['fileToUpload'])){
        $hasArchive = true ;
        archiveController::attachArchive($_FILES['fileToUpload']);
        archiveController::updateAttach($_FILES['fileToUpload']);
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
    <script src="./js/jquery.js"></script>
    <script src="./js/semantic.js"></script>

    <script src="./js/httpModule.js" type="application/javascript"></script>
    <script src="./js/main.js" type="application/javascript"></script>


</head>

<body>
    <div class="ui grey secondary pointing menu">
        <a class="grey item">Welcome <?php echo strtoupper($_SESSION['user']->getUserName()); ?></a>
        <!-- <a class="item">Home</a> -->
        <a class="item" href="profile.php">Profile</a>
        <a class="active item " href="messager.php">E-mail account</a>
        <a class="item" href="companyUsers.php">Company users</a>
        <div class="right menu">
            <a href="login.php" class="ui item">Logout</a>
        </div>
    </div>
    <div class="ui top attached tabular menu">
        <a class="grey item active" data-tab="first">Inbox</a>
        <a class="grey item" data-tab="second">Send Messages</a>
    </div>
    <div class="ui bottom attached tab segment active" data-tab="first">
        <div class="ui two column very relaxed grid">
            <div class="column">
                <table class="ui selectable table">
                    <thead>
                        <tr class="ui center aligned">
                            <th>Seen</th>
                            <th>Pic</th>
                            <th>Sender</th>
                            <th>Title</th>
                            <th>Sending Time</th>
                        </tr>
                    </thead>
                    <tbody id="jsTableMessage"></tbody>
                </table>
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
                    <div class="field">
                        <button id="jsAtachment" class="grey ui button">Download Attachments</button>
                        <button id="jsResponseMessage" class="grey ui button">Response</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
        <form class="ui form">
            <div class="field">
                <label for="destination">Select Destination</label>
                <span id="jsSendUsersSelect"></span>
            </div>
            <div class="field">
                <label for="title">Title</label>
                <input id="jsSendTitleMessage" type="text" name="title" id="title">
            </div>
            <div class="field">
                <label for="body">Body</label>
                <textarea id="jsSendBodyMessage" name="body" id="body" cols="30" rows="10"></textarea>
            </div>
            <div class="field">
                <form class="ui form" method="POST" action="messager.php" enctype="multipart/form-data">
                    <label for="title">Select attach file:</label>
                    <input type="file" name="fileToUpload">
                </form>
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