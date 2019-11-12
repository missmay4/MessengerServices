<?php
require_once '../entities/users.php';
require_once '../controller/archiveController.php';
require_once '../controller/userController.php';
require_once '../utils/sessionService.php';
SessionService::manageSession();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_FILES['PhotoProfile'])){
            $hasPhoto = true ;
            archiveController::modifyArchive($_FILES['PhotoProfile']);
        }
        
        $user = new Users(
            $_SESSION['user']->getID(),
            $_SESSION['user']->getUserName(),
            null ,
            null,
            $hasPhoto ? $_SESSION['user']->getID() . ".png" : 'def_userphoto.png',
            $_SESSION['user']->getEmail(),
            $_POST['age'],
            $_POST['address'],
            $_POST['Hobbies']
        );

        userController::modifyUsers($user);

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
    <script src="./js/profile.js" type="application/javascript"></script>

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
        <a class="active item" href="profile.php">Profile</a>
        <a class="item " href="messager.php">E-mail account</a>
        <div class="right menu">
            <a href="login.php" class="ui item">Logout</a>
        </div>
    </div>

    <div class="ui four column very relaxed grid centered">
        <div class="column">
            <div class="ui grey card">
                <div class="ui fluid image">
                    <img src="img/profile_photo/<?php echo $_SESSION['user']->getUserPhoto(); ?>">
                </div>
                <div class="content">
                    <a class="header"><?php echo $_SESSION['user']->getUserName(); ?></a>
                    <div class="meta">
                        <div><?php echo $_SESSION['user']->getEmail(); ?></div>
                        <div><b>Last time visit: </b><?php echo $_SESSION['user']->getLastVisit(); ?></div>
                        <div>Age : <?php echo $_SESSION['user']->getAge(); ?></div>
                        <div>Home Address : <?php echo $_SESSION['user']->getAddress(); ?></div>
                        <div>Hobbies : <?php echo $_SESSION['user']->getHobbies(); ?></div>
                        <button id="jsModifyButton" class="grey ui fluid button">MODIFY</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="jsEditableData" class="column" style="visibility:hidden;">
            <!-- <hr> -->
            <h1 class="centered align row" for="title"><b>About you</b></h1>
            <form class="ui form" method="POST" action="profile.php" enctype="multipart/form-data">
                <div class="field">
                    <label>Photo Profile Picture</label>
                    <input type="file" name="PhotoProfile" placeholder="Upload your photo here">
                </div>
                <div class="field">
                    <label>Age</label>
                    <input type="number" name="age" placeholder="18" min="18" max="100">
                </div>
                <div class="field">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Spain" >
                </div>
                <div class="field">
                    <label>Hobbies</label>
                    <textarea rows="4" cols="50" name="Hobbies" placeholder="Soccer"></textarea>
                </div>
                <button class="grey ui fluid button" type="submit">Update profile</button>
            </form>
            <!-- <hr> -->
        </div>
    </div>

</body>

</html>