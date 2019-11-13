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

    public static function sendRecoveryMail($address){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 2;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.live.com"; // GMAIL -> "smtp.gmail.com"
        $mail->Port = 587;
        $mail->Username = ""; // aqui poner el mail desde donde mandamos el recovery
        $mail->Password = ""; // contraseña del mail del recovery
        $mail->SetFrom('user@hotmail.com', 'Test');
        $mail->Subject = 'Password recovery';
        $mail->MsgHTML('This is a message for recovery password system');
        // $mail->AddAttachment('');
        $mail->AddAddress($address, '');
        $resul = $mail->Send();
        if(!$resul){
            echo "Error" . $mail->ErrorInfo;
        } else {
            echo "Sent";
        }
    }



}