<?php

   namespace App\Entity;

   
     class input
{
    private $login;
    private $password;
    private $email;  
    private $typeinput;
    private $check;
       
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
 

}
?>
