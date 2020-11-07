<?php 
namespace App\database;

use Doctrine\DBAL\Driver\Connection;

use Doctrine\ORM\Query\ResultSetMapping;

class connect  {

   
    function __construct($login,$pass){ 
   $this->login = $login; 
   $this->pass = $pass;   
}

 public function getlogin(){
 return $this->login;

}

public function getpass(){

return $this->pass;

}
   public function setconnect($login,$password){


  $connectionParams = array(
    'dbname' => 'etnc',
    'user' => $login,
    'password' => $password,
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
); 

return $this->connect =  \Doctrine\DBAL\DriverManager::getConnection($connectionParams); 
  
  } 
   
      public function selectcount($select,$from,$where,$data,$login,$password){

 $i = "SELECT ".$select." FROM ".$from." WHERE ".$where." = '$data'";

    $stmt = $this->setconnect($login,$password)->prepare($i);
    $stmt->bindValue(1, $data);
    $stmt->execute();
    $selectcount =  $stmt->fetch();
   return $selectcount; 
     } 

public function allcreateur($col,$pseudo){
   $conn = $this->connect;


 $sql ="SELECT *  FROM nextcloud WHERE createur ='$pseudo' ";

   $statement = $conn->prepare($sql);
  $statement->execute();

  $tab = array();
  while($results = $statement->fetch()){

  array_push($tab, $results[$col]);

}

 return $tab;

}

 
   public function login($pseudo,$pass,$session,$login,$password){
 
 $select = $this->selectcount("COUNT(*)pseudo ","membre","pseudo",$pseudo,$login,$password)['pseudo'];


$valide = 0;
   
  if($select  == 1){
   $logpseudo = $this->selectcount("*","membre","pseudo",$pseudo,$login,
$password)['pseudo']; 
  $logpass = $this->selectcount("*","membre","pseudo",$pseudo,$login,$password)['pass'];

  if(password_verify($pass,$logpass)){
 $valide = 1;

}else{


}
 
          if( $valide == 1){

       $session->set('username', $pseudo);


         }else{

        $error = "login ou mot de pass incorrect";

      }
      }

}
  public function inscription($pseudo,$pass,$email,$log,$password){

      $count  =   $this->selectcount("COUNT(*)pseudo ","membre","pseudo",$pseudo,$log,$password)['pseudo'];
      $countemail  =   $this->selectcount("COUNT(*)email ","membre","pseudo",$pseudo,$log,$password)['email'];


  if($count == 0  && $countemail == 0){
   $pass = password_hash($pass, PASSWORD_DEFAULT);
 $date = date("d").date("m").date("y");
 $length =  rand(10, 50);


$token = bin2hex(random_bytes($length));

$tokenmail = $token;

$verifemail = 0;

$length =  rand(10, 50);

$sql = 'INSERT INTO membre VALUES(NULL,"'.$pseudo.'","'.$pass.'","'.$email.'","'.$date.'", "'.$verifemail.'","'.$tokenmail.'")';

$con =  $this->setconnect($log,$password)->prepare($sql);

$con->bindValue(1, $pseudo);
$con->bindValue(1, $pass);
$con->execute();

 }

   }

}

?>
