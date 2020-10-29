<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class BookType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options): bool {
    $builder
      ->add('title', TextType::class, array(
        'label' => 'Название',
        'attr' => array('class' => 'form-control')))
      ->add('Author', TextType::class, array(
        'label' => 'Автор',
        'attr' => array('class' => 'form-control')))
      ->add('Year',  IntegerType::class, array(
        'label' => 'Год',
        'attr' => array('class' => 'form-control')))
      ->add('save', SubmitType::class, array(
        'label' => 'Сохранить',
        'attr' => array('class' => 'btn btn-primary mt-3')
    ));
    return true;
  }
}

?>
