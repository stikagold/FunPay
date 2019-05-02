<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 5/1/19
 * Time: 7:33 PM
 */

//Use any source of text, it's not important for me
$message = $_GET['sms'];

// Let's create patterns what we want to find
$patternWallet = "/\d{14}/";
$patternPassword = "/\d{4}/";
$patternAmount = "/(\d*[,]\d{2})/";

function getValueByPattern($pattern, $source){
    $result = [];
    preg_match($pattern, $source, $result);
    if(empty($result))
        return null;
    return array_pop($result);
}

// Opa, we have what we want, enjoy :)
$wallet = getValueByPattern($patternWallet, $message);
$password = getValueByPattern($patternPassword, $message);
$amount = getValueByPattern($patternAmount, $message);

