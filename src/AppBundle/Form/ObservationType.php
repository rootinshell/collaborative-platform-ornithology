<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObservationType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('comment', TextareaType::class, array(
            'label' => 'COMMENTAIRE (Facultatif)'
      ))
      ->add('date', DateType::class, array(
            'label' => 'DATE*',
            'html5' => false,
            'widget' => 'single_text',
      ))
      ->add('birdName', TextType::class, array(
                'label' => 'NOM DE L\'OISEAU'
      ));
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\Observation'
    ));
  }
}