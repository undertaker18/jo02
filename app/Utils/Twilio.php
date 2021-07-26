<?php

namespace App\Utils;

use Twilio\Rest\Client;
use App\Models\User;
use Exception;
use Log;

class Twilio
{
    public static function sendMessage($name, $recipientNumber)
    {
        $account_sid = 'ACeaa3b978b6ff772f87ef1fc615772d2f';
        $auth_token = 'a1a5d4a57079cf573d08f4355f8d6998';

        $senderNumber = '+18592740551';
        $message = 'Hi ' . $fullname . ', thank you for requesting a schedule for bible study. \r\n
        this is your full summary of your bible study request:\r\n' /*
        . $fullname , $email , $contactnumber , $birthdate , $religion , $bsdate , $bstime , $address  ;
         */

        try {
            $client = new Client($account_sid, $auth_token);
            $client->messages->create(
                $recipientNumber,
                array(
                    'from' => $senderNumber,
                    'body' => $message
                )
            );
        } catch (Exception $e) {
            Log::error($e->getMessage());
            echo $e->getMessage();
        }
    }
}