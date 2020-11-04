<?php 
namespace App\Services;

use Doctrine\DBAL\Driver\Connection;

use Doctrine\ORM\Query\ResultSetMapping;

class connect  {

private $userdatabase;

public  function __construct($userdatabase,$passmail){ 

   
}

public function getusermail(){

return $this->usermail;

}

public function getpassmail(){

return $this->passmail;

}

public function mails($adress,$subject,$message){



require_once("../admin/connectmail.php");  

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
  $this->SetFrom('admin@vecchionet.com', 'mot de passe oublier');
  $this->isHTML(true);
  $this->Subject = 'Here is the subject';
  $this->Body  = $message;
  $this->Send();


}

}

?>
