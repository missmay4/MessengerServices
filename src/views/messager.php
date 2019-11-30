<?php
require_once '../entities/users.php';
require_once '../utils/sessionService.php';
require_once '../controller/archiveController.php';
require_once './utils.php';

SessionService::manageSession();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messenger Services</title>
    <link rel="stylesheet" href="./css/semantic.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/semantic.js"></script>

    <script src="./js/httpModule.js" type="application/javascript"></script>
    <script src="./js/main.js" type="application/javascript"></script>

    <style>
        table {
            overflow-x: scroll;
            height: 10em;
            /* se dibujan barras según se necesite */
        }
    </style>
</head>

<body>
    <div class="ui centered blue secondary pointing menu">
        <p class="item" style="color: #0d71bb; font-weight: bold">Messenger Services</p>
        <p class="blue item">Welcome <?php echo strtoupper($_SESSION['user']->getUserName()); ?></p>
        <a class="item" href="profile.php">Profile</a>
        <a class="active item " href="messager.php">E-mail account</a>
        <a class="item" href="companyUsers.php">Company users</a>
        <div class="right menu">
            <a href="login.php" class="ui blue basic label">Log out</a>
        </div>
    </div>
    <div class="ui top attached tabular menu">
        <a id="jsLinkTab1" class="blue item" data-tab="first">Inbox</a>
        <a id="jsLinkTab2" class="blue item" data-tab="second">Send Messages</a>
        <!-- <a id="jsLinkTab3" class="blue item" data-tab="third">Send Messages to various users</a> -->
    </div>

    <div id="jsTab1" class="ui bottom attached tab segment active" data-tab="first">
        <div class="ui two column very relaxed grid">
            <div class="column">
                <div style="height:400px;overflow-x: scroll;">
                    <table class="ui blue selectable table">
                        <thead>
                            <tr class="ui center aligned">
                                <th>Seen</th>
                                <th>Avatar</th>
                                <th>Sender</th>
                                <th>Title</th>
                                <th>Sending Time</th>
                            </tr>
                        </thead>
                        <tbody id="jsTableMessage"></tbody>
                    </table>
                </div>
            </div>

            <div class="column">
                <form class="ui form">
                    <div class="field">
                        <label for="sender">Sender</label>
                        <input id="jsSenderMessage" type="text" name="title" id="title" disabled>
                    </div>
                    <div class="field">
                        <label for="title">Title</label>
                        <input id="jsTitleMessage" type="text" name="title" id="title" disabled>
                    </div>
                    <div class="field">
                        <label for="body">Body</label>
                        <textarea id="jsBodyMessage" name="body" id="body" cols="30" rows="10" disabled></textarea>
                    </div>
                    <div class="field">
                        <div id="attachJS" class="ui right pointing red basic label" style="display:none;">
                            
                        </div>
                        <button id="jsAtachment" class="blue ui button">Download Attachments</button>
                        <button id="jsResponseMessage" class="blue ui button">Response</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="jsTab2" class="ui bottom attached tab segment" data-tab="second">
        <form class="ui form" name="formSendMessage" enctype="multipart/form-data">
            <div class="field required">
                <label for="destination">Select user/s</label>
                <span id="jsSendUsersSelect"></span>
            </div>
            <div class="field required">
                <label for="title">Title</label>
                <input id="jsSendTitleMessage" type="text" name="title" id="title">
            </div>
            <div class="field required">
                <label for="body">Body</label>
                <textarea id="jsSendBodyMessage" name="body" id="body" cols="30" rows="10"></textarea>
            </div>
            <div class="field">
                <label for="title">Select attach file:</label>
                <input type="file" name="fileToUpload" id="jsFileInput">
            </div>
            <div class="two ui buttons">
                <button class="blue ui button" id="jsSendMessageButton">Send</button>

                <button class="blue ui button" type="reset">Reset</button>
            </div>
        </form>
    </div>
    <script type="application/javascript">
        $('.menu .item').tab();
    </script>
</body>

</html>