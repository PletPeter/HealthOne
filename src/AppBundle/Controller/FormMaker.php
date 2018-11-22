<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 20/11/2018
 * Time: 03:02
 */

namespace AppBundle\Controller;



use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormMaker extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medicijnnaam', TextType::class)
            ->add('beschrijving')
            ->add('bijwerkingen')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => 'AppBundle\Entity\Medicijnen'
        ]);
    }
}