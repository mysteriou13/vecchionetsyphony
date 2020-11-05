<?php 

  namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use App\Entity\input;
use App\database\connect;
use App\database\parametre;
use App\Services\mails;


class 	Advert extends AbstractController{

/**
*@Route("/{id}", name ="home")
*
*/

  public function index(connect $connect,mails $mail,Request $request,SessionInterface $session,$id )
    {

$error = null;

$input = new input();

 $formlogin = $this->login($input,$request);
 
 $forminscription = $this->inscription($input,$request);

  $oublipass = $this->oublipass($input,$request);

    
     $pseudo = $formlogin->get('login')->getData();
     $pass = $formlogin->get('password')->getData();
     $loginpris = null;
     $emailpris = null;
     $allcreateur = null;
     $nbcreateur = null; 
     $allcreateur = null;
     $alldate = null;
     $nbcreateur =null;
     $countnextcloud = null;


     $erroroublicpass = null;
    $page = $this->page($session,$id);

  
    $idparametre = $request->get('parametre');
    $idnextcloud = $request->get('nextcloud');
    $this->myVal = 0;
    $i = 0;
    $myVal = 0;

    $log = $connect->getlogin();
    $password = $connect->getpass();

   $p = new parametre($session->get('username'),$log,$password);     

  $afficheparametre = $this->afficheparametre($session,$request,$p,$log,$password);


   if($request->getMethod() == "POST" ){

    $pseudo = $formlogin->get('login')->getData();
    $pass = $formlogin->get('password')->getData();


  if ($formlogin->isSubmitted() && $formlogin->isValid()) {
    
   $connect->login($pseudo,$pass,$session,$log,$password);  
    
    $pseudo = $formlogin->get('login')->getData();
    $pass = $formlogin->get('password')->getData();


    }
   
     if($forminscription->isSubmitted() && $forminscription->isValid()) {
   
     $pseudo = $forminscription->get('login')->getData();
     $pass = $forminscription->get('password')->getData();
     $email = $forminscription->get('email')->getData();
    
  
      $connect->inscription($pseudo,$pass,$email);
 
    $selectpseudo =  $connect->selectcount("COUNT(*)pseudo ","membre","pseudo",$pseudo)['pseudo'];

    $selectemail =  $connect->selectcount("COUNT(*)email ","membre","pseudo",$pseudo)['email'];

  if($selectpseudo == 1){
  $loginpris = " erreur pseudo pris";

   }    

  if($selectemail == 1){
 $emailpris = " erreur email pris";

   }

   }

}

if($_SERVER['HTTP_HOST'] == "localhost"){

 $domaine = "http://".$_SERVER['HTTP_HOST']."/my_project_name/public/";

}else{

 $domaine ="http://".$_SERVER['HTTP_HOST']."/";

} 



if($oublipass->isSubmitted() && $oublipass->isValid()){

$this->liennewpass($oublipass->get('email')->getData(),$connect,$mail);

}


   if($id == "deconnection" && $request->getMethod() != 'POST'){
 
     $session->set('username',null);  

  }
    

   if($session->get('username') == null && $id == "parametre"){


    return $this->redirect("./index");
  }


$allcreateur = $p->getallcreateur("pseudo",$session);

$createur = $p->getallcreateur("createur",$session); 

$alldate = $p->getallcreateur("date",$session);


 $nbcreateur = $p->selectcount("COUNT(*)createur","nextcloud","createur",$session->get('username'),$log,$password)['createur']-1;


       return $this->render($page, [
       
        'form' => $formlogin->createView(), 'error' => $error, 
       'inscription'=> $forminscription->createView(),
       'emailpris'=> $emailpris, "loginpris" => $loginpris, "id"=> $idparametre,  "parametre"=>$idparametre, "nextcloud" => $idnextcloud,  
"log" => $p->getselectmembre(), "thier" => $allcreateur,
"nbcreateur" => $nbcreateur, "alldate" => $alldate, "myVal"=>$myVal,
"createur"=>$createur, 
"i"=>$i,
"countnextcloud"=> $nbcreateur, "form" => $formlogin->createView(), 
"oubli" => $oublipass->createView(),"erroroublicpass" => $erroroublicpass

]);

    }

 public function page($session,$id){


 $page = './Advert/'.$id.'.html';

      if($session->get('username') != null && $id == "inscription"){
 
      $page = "./Advert/index.html";
 
     }

return $page;

 } 

public function afficheparametre($session,$request,$p,$log,$password){

  $p = new parametre($session->get('username'),$log,$password);     

 if($session != null){

  }else{

$p = new parametre(null);

}


    $idparametre = $request->get('parametre');
 
    if( $request->get('parametre') == "perso"){
  $idparametre = "parametre";

   }else{

$idparametre = "nextcloud";

 }

 $idparametre;

}


 public function liennewpass($oubli,$connect,$mail){

if($_SERVER['HTTP_HOST'] == "localhost"){

 $domaine = "http://".$_SERVER['HTTP_HOST']."/my_project_name/public/";

}else{

 $domaine ="http://".$_SERVER['HTTP_HOST']."/";

} 

 $oublipasspage = $domaine."index.php/newpass";

 $liennewpass = "<a href = '$oublipasspage'>'nouveau mot de pass'</a>";


$oublipassemail = $oubli;

$searchmail = $connect->selectcount("COUNT(*)email ","membre","email",$oubli)['email'];

$tokenmail = $connect->selectcount("*","membre","email",$oublipassemail);

$token = $tokenmail['email'];

 $oublipassemail = $oublipasspage."?tokenmail=".$token;

if($searchmail == 1){

$mail->mails($oubli,"mot de pass oublier", $liennewpass);

}

  }

public function login($input,$request){

  $login = $this->createFormBuilder($input)
          ->add('login', TextType::class)
          ->add('password', PasswordType::class)
          ->add('connection', SubmitType::class)
          ->getForm();

return $login->handleRequest($request);

 }

 public function inscription($input,$request){

  $inscription = $this->createFormBuilder($input)
            ->add('login', TextType::class)
            ->add('password', PasswordType::class)
            ->add('email', EmailType::class)
            ->add('check', CheckboxType::class, ['label' =>'accepter les CGU'] )
            ->add('inscription', SubmitType::class)
            ->getForm();
 
   return $inscription->handleRequest($request);



 } 
 
  public function oublipass($input,$request){

 $oublipass = $this->createFormBuilder($input)
            ->add('email', EmailType::class)
            ->add('submit', SubmitType::class,['label'=> 'envoyer'])
            ->getForm();

return $oublipass->handleRequest($request);

  } 


  }

?>
