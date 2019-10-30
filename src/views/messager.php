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
</head>
<body>
    <hr>
    HOLA <?php echo $_SESSION['user']->getUserName();?>
    <hr>
    <?php echo renderMsgTable()?>
    <hr>
    Send MSG TO :
    <form action="./messager.php" method="post">
        <br>
        Select Destination : <?php echo getUserOptions()?>
        <br><br>
        Title :<input type="text" name="title" id="title">
        <br><br>
        <textarea name="body" id="body" cols="30" rows="10"></textarea>
        <br><br>
        <button type="submit">Send</button>
        <button type="reset">Reset</button>
    </form>
    <hr>
</body>
</html>