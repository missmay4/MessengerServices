<?php

use function PHPSTORM_META\type;

function renderMsgTable(){
        
        $user = $_SESSION['user'];
        $messages = MessagerController::getMessages($user);

        $table ="<table>
                <tr>
                    <th>Seen</th>
                    <th>Sender</th>
                    <th>Title</th>
                    <th>Sending Time</th>
                </tr>";

        if( count($messages) == 0){
            $table .= "<tr>
                <td colspan='4' > No Messages </td>
            </tr>";
        }
        else{
            foreach ($messages as $msm) {
                $table .= "<tr>
                    <td><input type='checkbox'".($msm->getSeen()?"checked":"")."></td>
                    <td>".$msm->getSender() ."</td>
                    <td>".$msm->getTitle() ."</td>
                    <td>".$msm->getSendingTime() ."</td>
                </tr>";
            }
        }
        return $table .= "</table>";
    }

    function getUserOptions(){
        $users = MessagerController::getUsers();
        $html = "<select name='destination'>";
        foreach ($users as $usu ) {
            $html .= "<option value=".$usu['ID'].">". $usu['username'] ."</option>";
        }

        return $html .= "<select>";
    }