<?php 

namespace  App\database;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class forminscription extends AbstractType{

   public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
            ->add('login', TextType::class)
            ->add('password', PasswordType::class)
            ->add('email', EmailType::class)
            ->add('check', CheckboxType::class, ['label' =>'accepter les CGU'] )
            ->add('inscription', SubmitType::class)

;

    }


}

?>

