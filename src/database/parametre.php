<?php 
namespace App\database;

use App\database\connect;

class parametre extends connect{


function __construct($pseudo,$login,$password){

$this->pseudo = $pseudo;

$this->selectmembre =  $this->selectcount("*","membre","pseudo",$pseudo,$login,$password);

$this->countnextcloud = $this->selectcount("COUNT(*)createur","nextcloud", "createur",$pseudo, $login,$password);

$this->selectnextloud = $this->selectcount("*", "nextcloud", "pseudo",$pseudo,$login,$password
);


$this->thienextcloud = $this->selectcount("*", "nextcloud", "createur",$pseudo,
$login,$password

)
;


}



public function getallcreateur($col,$session){


return  $this->allcreateur($col,$this->pseudo);

}

 
public  function getselectmembre(){

 return $this->selectmembre;

}

public function getcountnextcloud(){

return $this->countnextcloud;

}

 public function getselectnextcloud(){

 return $this->selectnextloud;

}

 public function getthiercloud(){

  return $this->thienextcloud;

}



 public function verifemail(){

 $verif =  $this->getselectmembre()['verifemail']; 

$email = null;

 return $verif; 

/*
if(isset($_GET['email']) && !empty($_GET['email'])){

$length =  rand(10, 50);

$token = bin2hex(random_bytes($length));

$message = "pour confirmé votre adress mail copier  dans votre navigateur web : :".$link;

$e->envoiemail($select2['email'],"confirmation email",$message,"mrmassaanthony@gmail.com");



}
*/

}


 }

   
?>

