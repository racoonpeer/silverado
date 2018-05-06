<?php defined('WEBlife') or die( 'Restricted access' ); // no direct access

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TurboSms {
    
    const API_LOGIN    = "fcdkkillthemall";
    const API_PASSWORD = "2c4uk915";

    protected $client;
    
    public function __construct() {
        $this->client = new SoapClient('http://turbosms.in.ua/api/wsdl.html');
        $this->client->Auth(PHPHelper::dataConv([
            'login'    => self::API_LOGIN,   
            'password' => self::API_PASSWORD
        ]));
    }
    
    public function send ($sender, $destination, $text, $wappush = false) {
        $sms = [   
            'sender'      => $sender,   
            'destination' => $destination,   
            'text'        => $text   
        ]; if ($wappush) $sms["wappush"] = $wappush;
        return $this->client->SendSMS(PHPHelper::dataConv($sms));
    }
}