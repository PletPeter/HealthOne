<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 07/02/2019
 * Time: 08:37
 */

namespace AppBundle\Form;


use AppBundle\Entity\Les;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class LesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('tijd', TimeType::class)
            ->add('datum', DateType::class, ['widget' => 'single_text'])
            ->add('locatie')
            ->add('personenmax', NumberType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Les::class,
        ]);
    }
}