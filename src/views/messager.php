<?php 
    require_once '../entities/users.php';
    require_once '../utils/sessionService.php';
    require_once '../controller/messagerController.php';
    require_once './utils.php';

    SessionService::manageSession();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $message = new Messages(
            null , 
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
    <script src="./js/httpModule.js" type="application/javascript"></script>
    <script src="./js/main.js" type="application/javascript"></script>
</head>
<body>
    <hr>
    HOLA <?php echo $_SESSION['user']->getUserName();?>
    <hr>
    <div id="jsTableMessage"></div>
    <hr>
    Send MSG TO :
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
    <hr>
</body>
</html>