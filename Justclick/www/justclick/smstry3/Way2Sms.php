<?php
 
/*
 *
 *  Author Name     : Thangaraj Mariappan
 *  Email           : thaangaraj@gmail.com
 *  Created on      : 2012-07-14
 *  Updated on	    : 2013-01-26
 *  Description     : Send SMS Via Way2SMS.
 *
 *  Copyright 2012 Openshell. All rights reserved.
 */

    include_once 'CurlProcess.php';

    class Way2Sms{
        
        var $login;
        var $curl;
        var $token;
        var $autobalancer;
        
        public function Way2Sms()
        {
            $this->login        =   FALSE;
            $this->autobalancer =   rand(1, 8);
            $this->curl         =   new CurlProcess();
        }
        
        public function login($username, $password)
        {
            $post_data  =   "username=$username&password=$password&userLogin=no&button=Login";
            $url        =   "http://site".$this->autobalancer.".way2sms.com/Login1.action";
            $ref        =   "http://site".$this->autobalancer.".way2sms.com/entry.jsp";
            $content    =   ($this->curl->post($url,$post_data,$ref));
            
            // Find customer token id
            $regex      =   '/name="Token" id="Token" value="(.*)"/';
            preg_match($regex,$content,$match);
            
            if (!stristr($content,"Logout")) {
                $this->login=FALSE;
                return false;
            } else {
                $this->token=$match[1];
                $this->login=TRUE;
                return true;
            }
        }
        
        public function send($number,$message)
        {
            if ($this->login) {
                $ref        =   "http://site".$this->autobalancer.".way2sms.com/jsp/InstantSMS.jsp?Token=".$this->token;
                $content    =   $this->curl->get($ref);
                // Dynamic read input & textarea tag from the page
                preg_match_all('/<(input|textarea)(?=[^>]* id=["\']([^\'"]*)|)(?=[^>]* name=["\']([^\'"]*)|)(?=[^>]* value=["\']([^\'"]*)|)/',$content,$results);
                $mobileNo    =  trim($number);
                $msg         =  urlencode(trim($message));
                $inputIds    =  $results[2];
                $inputNames  =  $results[3];
                $inputValues =  $results[4];
                $post_data    =  "";
                foreach($inputNames as $key => $inputName){
                  if(!empty($inputName)) {
                    if($inputValues[$key] == "Mobile Number")
                      $post_data  .=  "&".$inputName."=".$mobileNo;
                    elseif($inputName == "textArea")
                      $post_data  .=  "&".$inputName."=".$msg;
                    else
                      $post_data  .=  "&".$inputName."=".$inputValues[$key];
                  }
                }
                // Dynamic read select tag from the page
                preg_match_all("#<select(?=[^>]* name=[\"']([^'\"]*)|)(\s+[^>]*)?>(.|\n)*?</select>#",$content,$selectResults);
                $selectNames  =  $selectResults[1];
                $selectTags   =  $selectResults[0];
                foreach($selectTags as $selectTagKey => $selectTag){
                  preg_match('/value="(.*)"/',$selectTag,$selectOptValue);
                  $post_data  .=  "&".$selectNames[$selectTagKey]."=".$selectOptValue[1];
                }
                // Dynamically get form action url to send sms
                $regex      =   "/<form.*action=(\"([^\"]*)\"|'([^']*)'|[^>\s]*)([^>]*)?>/is";
                preg_match($regex,$content,$match);
                $frmAction  =   $match[1];
                $frmAction  =   trim(str_replace(array('"','..','/'), ' ', $frmAction));
                $url        =   "http://site".$this->autobalancer.".way2sms.com/".$frmAction;

                $content    =   ($this->curl->post($url,$post_data,$ref));
                if(stristr($content,"submitted successfully"))
                    return true;
                else
                    return false;
            } else
                return false;//echo "<h2>Please login to send SMS</h2>";
        }
        
        public function functionName($value='')
        {
            $post_data  =   "1=1";
            $url        =   "http://site".$this->autobalancer.".way2sms.com/jsp/logout.jsp";
            $content    =   ($this->curl->post($url,$post_data));
            
            if(stristr($content,"successfully logged out"))
                return true;
            else
                return false;
        }
    }
    
?>
