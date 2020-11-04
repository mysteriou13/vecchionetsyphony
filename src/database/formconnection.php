<?php 
 namespace App\database;

use App\Entity\input;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class formconnection extends AbstractType{

     public function buildForm(FormBuilderInterface $builder, array $options)
{
  $builder
->add('login', TextType::class)
->add('password', PasswordType::class)
->add('connection', SubmitType::class)
;

}

 }

?>
