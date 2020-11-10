<?php 
namespace App\Entity;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class email extends PHPMailer{



public function __construct(){

}


public function mails($adress,$subject,$message){

 $Usermail = "admin@vecchionet.com";

  $this->IsSMTP();
  $this->SMTPAuth   = true;                  
  $this->SMTPSecure = "ssl";                
  $this->Host       = "mail31.lwspanel.com";      
  $this->Port       = 465;                   
  $this->Username   = $Usermail;  
  $this->Password   = $passmail;  
  $this->AddReplyTo('admin@vecchionet.com', 'admin');
  $this->AddAddress($adress,"adress");
  $this->addAddress('admin@vecchionet.com', 'admin');
  $this->SetFrom('admin@vecchionet.com', 'mot de passe oublier');
  $this->Subject = $subject;
  $this->isHTML(true);
  $this->Subject = 'Here is the subject';
  $this->Body  = $message;
  $this->Send();



}


}

?>
