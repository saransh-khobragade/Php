<?php

/*
 *
 *  Author Name     : Thangaraj Mariappan
 *  Email           : thaangaraj@gmail.com
 *  Created on      : 2012-07-14
 *  Updated on	    : 2013-01-19
 *  Description     : Send SMS
 *
 *  Copyright 2012 Openshell. All rights reserved.
 */
 
   /*$username   =   trim($_REQUEST['mob']);
    $password   =   trim($_REQUEST['pwd']);
    $receiver   =   trim($_REQUEST['rec']);
    $message    =   trim($_REQUEST['msg']);*/
	
	$username   =  '9993140550';
    $password   =   '31285';
    $receiver   =   '9406062290';
    $message    =   'panda !!';

    if (empty($username))
        echo "Enter Mobile No";
    elseif (empty($password))
        echo "Enter Password";
    else {
        require_once 'Way2Sms.php';
        $sms            =   new Way2Sms();
        $result         =   $sms->login($username, $password);
        if($result) {
            $smsStatus  =   $sms->send($receiver, $message);
            if($smsStatus)
                echo "Message sent successfully";
            else
                echo "Unable to send message";
        }
        else
            echo "Invalid Mobile No or Password";
    }
  
?>
