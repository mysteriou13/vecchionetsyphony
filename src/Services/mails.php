<?php 
namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class mails extends PHPMailer {

    private $usermail;


    public function __construct($usermail,$passmail)
 {
 
 $this->usermail = $usermail; 
 $this->passmail = $passmail;
 
    }

public function getusermail(){

return $this->usermail;

}

public function getpassmail(){

return $this->passmail;

}

public function mails($adress,$subject,$message){

  $this->IsSMTP();
  $this->SMTPAuth   = true;                  
  $this->SMTPSecure = "ssl";                
  $this->Host       = "mail31.lwspanel.com";      
  $this->Port       = 465;                   
  $this->Username   = $this->getusermail();  
  $this->Password   = $this->getpassmail();  
  $this->AddReplyTo('admin@vecchionet.com', 'admin');
  $this->AddAddress($adress,"adress");
  $this->addAddress('test@test.com', 'admin');
  $this->SetFrom('admin@vecchionet.com', $subject);
  $this->isHTML(true);
  $this->Subject = $subject;
  $this->Body  = $message;
  $this->Send();


}
}

?>
