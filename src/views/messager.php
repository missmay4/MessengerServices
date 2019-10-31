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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

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
    <div id="jsMessageDetails"></div>
    <hr>
</body>
</html>