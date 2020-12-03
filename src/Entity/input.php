<?php

   namespace App\Entity;

   
     class input
{
    private $login;
    private $password;
    private $email;  
    private $typeinput;
    private $check;
    private $nomcontact;
    private $contactemail;
    private $message;
    private $suject;  
    private $submit;

    public function getlogin()
    {
        return $this->login;
    }

    public function setlogin($login)
    {
        $this->login = $login;
    }

     public function getpassword()
    {
        return $this->password;
    }

    public function setpassword($password)
    {
        $this->login = $password;
    }

   public function getemail(){
    return $this->email;
    }  

   public function setemail($email){
    $this->email = $email;
 } 

   public function gettypeinput(){

   return $this->typeinput;

    }

  public function settypeinput($typeinput){

  return $this->inputtype = $typeinput;

   }
   public function getcheck(){

   return $this->check;

    }

  public function setcheck($check){

   $this->check = $check;

   }

     public function getnomcontact(){
  
    return  $this->nomcontact;

     }
  
   public function setnomcontact($contactemail){

   $this->nom = $contactemail;

   }  

    public function getcontactemail(){
  
    return  $this->contactemail;

     }
  
   public function setcontactemail($contactemail){

   $this->contactemail = $contactemail;

   }  

   public function getmessage(){
  
    return  $this->message;

     }
  
   public function setmessage($message){

   $this->message = $message;

   }  
 
   public function getsuject(){
  
    return  $this->suject;

     }
  
   public function setsuject($suject){

   $this->suject = $suject;

   }  

  public function getsubmit(){
 
  return $this->submit;
  
 }
 
  public function setsubmit(){

  $this->submit = $submit;
  
  }

 }
?>
