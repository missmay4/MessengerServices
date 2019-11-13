<?php
use PHPMailer\PHPMailer\PHPMailer;
require "../vendor/autoload.php";
require_once '../model/userModel.php';

class recoveryController

{
    public static function checkUserEmail($username, $email){
        $res = UserModel::getUsernameEmail($username, $email);
        if (!$res) {
            header('Location: forgotpassword.php');
            return 0;
        }
    }

    public static function sendRecoveryMail($address , $subject , $content , $mask = 'NoReply'){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->Username = "phpserverphp@gmail.com"; // aqui poner el mail desde donde mandamos el recovery
        $mail->Password = "php123php"; // contraseña del mail del recovery
        $mail->SetFrom('phpserverphp@gmail.com', $mask );
        $mail->Subject = $subject;
        $mail->MsgHTML($content);
        // $mail->AddAttachment('');
        $mail->AddAddress($address, '');
        return $mail->Send();
    }



}