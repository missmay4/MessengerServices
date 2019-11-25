<?php
use PHPMailer\PHPMailer\PHPMailer;
require "../vendor/autoload.php";
require_once '../model/userModel.php';
/**
 * Class to manage the recovery password
 */
class recoveryController{

/*
    public static function checkUserEmail($username, $email){
        $res = UserModel::getUsernameEmail($username, $email);
        if (!$res) {
            header('Location: forgotpassword.php');
            return 0;
        }
    } */

    /**
     * Params a object User and email address 
     * and send a gmail with 'How restar your password'
     */
    public static function sendRecoveryMail($user , $address ){

        $uniqID = uniqid();
        UserModel::changeUserState( $user , $uniqID );

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
            <container>
            
              <row class=\"header\">
                <columns>
                  <h4 class=\"text-center\">Hello, $user</h4>
                </columns>
              </row>
              <row>
                <columns>
                  <h1 class=\"text-center\">Forgot Your Password?</h1>
                  <p class=\"text-center\">It happens. Click the link below to reset your password.</p>
                  <a href='http://localhost/MessengerServices/src/views/changepassword.php?changeid=$uniqID'>Reset password</a>
                  <hr/>
                  <p><small>You're getting this email because you've signed up for email updates.</small></p>
                </columns>
              </row>
            </container>");
        // $mail->AddAttachment('');
        $mail->AddAddress($address, '');
        return $mail->Send();
    }



}