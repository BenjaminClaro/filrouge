<?php

namespace App\Form;

use App\Controller\CommandeController;
use App\Entity\Commandes;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use App\Controller\EntityManagerInterface;
use Monolog\DateTimeImmutable;


class CommandeType extends AbstractType
{




    public function buildForm(FormBuilderInterface $builder, array $options ): void
    {



        
        $builder



            ->add('date_commande',  DateTimeType::class, [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                
                'attr' => ['style' => 'display: none;'], 
                'label' => false,
            ])
            
            ->add('etat', NumberType::class, [
                'data' => 1 ,
                'attr' => ['style' => 'display: none;'],
                'label' => false,
            ] )
            
            
            
            
            ->add('total', HiddenType::class)

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                    'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Commandes::class,
        ]);
    }
}
