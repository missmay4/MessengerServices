<?php
use PHPMailer\PHPMailer\PHPMailer;
require "../vendor/autoload.php";
require_once '../model/userModel.php';

class recoveryController{
    public static function checkUserEmail($username, $email){
        $uniqID = uniqid();
        UserModel::changeUserState( $username , $uniqID );
        $res = UserModel::getUsernameEmail($username, $email , $uniqID);
        if (!$res) {
            header('Location: forgotpassword.php');
            return 0;
        }
    }

    public static function sendRecoveryMail($user , $address , $uniqID){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->Username = "phpserverphp@gmail.com"; // aqui poner el mail desde donde mandamos el recovery
        $mail->Password = "php123php"; // contraseña del mail del recovery
        $mail->SetFrom('phpserverphp@gmail.com', 'NoReply' );
        $mail->Subject = 'Password recovery';
        $mail->MsgHTML("
            <h1>Hello my friend .$user.</h1>
            
            <h2>To recovery your password follow this steps :</h2>

            <ul>
                <li>1.- Follow the link below</li>
                <li>2.- Fill your form with your next password</li>
                <li>3.- And follow enjoying our app</li>
            </ul>

            <button><a href='http://localhost/changepassword.php?changeid='".$uniqID."></a></button>

        ");
        // $mail->AddAttachment('');
        $mail->AddAddress($address, '');
        return $mail->Send();
    }



}