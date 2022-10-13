<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Mailer extends PHPMailer{
    public function __construct($configEmail) {
        $this->SMTPDebug = SMTP::DEBUG_SERVER;                     
        $this->isSMTP();                                           
        $this->Host       = 'smtp.gmail.com';                    
        $this->SMTPAuth   = true;                                  
        $this->Username   = $configEmail['username'];                    
        $this->Password   = $configEmail['password'];                             
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $this->Port       = 465;   
        $this->isHTML(true);   
        $this->setFrom($configEmail['username'], 'Mailer');//người gửi email
        $this->CharSet = 'utf-8';                        
    }

    public function sendMail($arrParams,$options = '' ){
        try {
           $this->addAddress($arrParams['email']); // người nhận email  
           $this->addCC('sanghm.teach@gmail.com'); // 
            //Content                             
           $this->Subject = 'ZendVN đã nhận được yêu cầu liên hệ lại từ bạn';
           $this->Body    = '<p>Thông tin của bạn là:</p>
        <ul>
            <li>Họ tên: ' . $arrParams['name'] . '</li>
            <li>Email: ' . $arrParams['email'] . '</li>
            <li>Tiêu đề: ' . $arrParams['title'] . '</li>
            <li>Nội dung: ' . $arrParams['message'] . '</li>
        </ul>';
           $this->send();
           return true;
        } catch (Exception $e) {
            return false;
        }
    }
}