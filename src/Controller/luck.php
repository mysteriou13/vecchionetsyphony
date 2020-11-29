<?php
    namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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




class luck extends AbstractController 

{

  /**
  *  @Route("/{id}", name = "number" )
  */

    public function number(connect $connect,mails $mail,Request $request,SessionInterface $session,$id)    
{

 if($_SERVER['SERVER_NAME'] == "localhost"){

 
 $domaine =  "http://".$_SERVER['SERVER_NAME']."/vecchionetsyphony"; 

 }else{
  
  $domaine = "https://".$_SERVER['SERVER_NAME'];

}
  
 $error = null;

 $input = new input();

 $formlogin = $this->fromlogin($input,$request);

 $oublipass = $this->oublipass($input,$request);
 
 $forminscription = $this->frominscription($input,$request);

 $formcontact = $this->fromcontact($input,$request);


    
     $pseudo = null;
     $pass = null;
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

$valide = 2;
    

 $valide = $this->formlogin($formlogin,$connect,$session,$log,$password); 
 
   $this->forminscription($forminscription,$connect,$log,$password);

   $this->contact($formcontact,$mail);

$this->oublipassword($connect,$mail,$oublipass,$log,$password);

$this->deconnect($id,$request,$session); 

$allcreateur = $p->getallcreateur("pseudo",$session);

$createur = $p->getallcreateur("createur",$session); 

$alldate = $p->getallcreateur("date",$session);


 $nbcreateur = $p->selectcount("COUNT(*)createur","nextcloud","createur",$session->get('username'),$log,$password)['createur']-1;


       return $this->render($page, [
       
        'form' => $formlogin->createView(), 'error' => $error, 
       'inscription'=> $forminscription->createView(),'contact' => $formcontact->createView(),
       'emailpris'=> $emailpris, "loginpris" => $loginpris, "id"=> $idparametre,  "parametre"=>$idparametre, "nextcloud" => $idnextcloud,  
"log" => $p->getselectmembre(), "thier" => $allcreateur,
"nbcreateur" => $nbcreateur, "alldate" => $alldate, "myVal"=>$myVal,
"createur"=>$createur, 
"i"=>$i,
"countnextcloud"=> $nbcreateur, "form" => $formlogin->createView(), 
"oubli" => $oublipass->createView(),
"erroroublicpass" => $erroroublicpass, "valide" => $valide, "domaine" => $domaine

]);

    }

public function deconnect($id,$request,$session){

   if($id == "deconnection" && $request->getMethod() != 'POST'){
 
     $session->set('username',null);  

  }
    

   if($session->get('username') == null && $id == "parametre"){

    return $this->redirect("./index");

  }



   }


public function oublipassword($connect,$mail,$oublipass,$log,$password){

if($oublipass->isSubmitted() && $oublipass->isValid()){

$this->liennewpass($oublipass->get('email')->getData(),$connect,$mail,$log,$password);

}
}

  public function forminscription($forminscription,$connect,$log,$password){

    if($forminscription->isSubmitted() && $forminscription->isValid()) {
   
     $pseudo = $forminscription->get('login')->getData();
     $pass = $forminscription->get('password')->getData();
     $email = $forminscription->get('email')->getData();
     
    $selectpseudo =  $connect->selectcount("COUNT(*)pseudo ","membre","pseudo",$pseudo,$log,$password)['pseudo'];

    $selectemail =  $connect->selectcount("COUNT(*)email ","membre","pseudo",$pseudo,$log,$password)['email'];

  if($selectpseudo == 1){
  $loginpris = " erreur pseudo pris";

   }    

  if($selectemail == 1){
 $emailpris = " erreur email pris";

   }

   if($selectpseudo == 0 && $selectemail == 0){ 
 
     $connect->inscription($pseudo,$pass,$email,$log,$password);
   
   }

   }


  }


 

  public function formlogin($formlogin,$connect,$session,$log,$password){

    $valide = 2;

   if ($formlogin->isSubmitted() && $formlogin->isValid()) {

    $pseudo = $formlogin->get('login')->getData();
    $pass = $formlogin->get('password')->getData();

   $valide =  $connect->login($pseudo,$pass,$session,$log,$password);      

    } 
 
 return $valide;

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


 public function liennewpass($oubli,$connect,$mail,$log,$password){

if($_SERVER['HTTP_HOST'] == "localhost"){

 $domaine = "http://".$_SERVER['HTTP_HOST']."/my_project_name/public/";

}else{

 $domaine ="http://".$_SERVER['HTTP_HOST']."/";

} 

 $oublipasspage = $domaine."index.php/newpass";

 $liennewpass = "<a href = '$oublipasspage'>'nouveau mot de pass'</a>";


$oublipassemail = $oubli;

$searchmail = $connect->selectcount("COUNT(*)email ","membre","email",$oubli,$log,$password)['email'];

$tokenmail = $connect->selectcount("*","membre","email",$oublipassemail,$log,$password);

$token = $tokenmail['email'];

 $oublipassemail = $oublipasspage."?tokenmail=".$token;

if($searchmail == 1){

$mail->mails($oubli,"mot de pass oublier", $liennewpass);

}

  }


 public function fromcontact($input,$request){

 $contact = $this->createFormBuilder($input, )
      ->add('nomcontact' ,TextType::class, ['label' => 'nom'] )
      ->add('suject' ,TextType::class, ['label' => 'sujet'] )
      ->add('contactemail', EmailType::class, ['label' => 'adress mail'])
      ->add('message',TextareaType::class, ['label' => null,  'attr' => ['style' => 'vertical-align: top;  width:300px; height:200px'], ])
      ->add('connection', SubmitType::class) 
      ->getForm();
  
  return $contact->handleRequest($request);

}

 public function contact($contact,$mail){

  if ($contact->isSubmitted() && $contact->isValid()) {


    $nom = $contact->get('nomcontact')->getData();
  
    $sujet = $contact->get('suject')->getData();
    $email = $contact->get('contactemail')->getData();
    $message = $contact->get('message')->getData();

    $mail->mails("elio007@hotmail.fr",$sujet,$message);

  }

}

public function fromlogin($input,$request){

  $login = $this->createFormBuilder($input)
          ->add('login', TextType::class)
          ->add('password', PasswordType::class)
          ->add('connection', SubmitType::class)
          ->getForm();

return $login->handleRequest($request);

 }

 public function frominscription($input,$request){

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
