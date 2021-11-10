<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ContactType extends AbstractType
{
    private function getConfiguration($label, $placeholder, $options = []) {
        return array_merge([
            'label' => $label,
            'attr' => [
            'placeholder' => $placeholder
            ],
        ], $options);
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, $this->getConfiguration("Nom", "Tapez le nom de votre contact"))
            ->add('prénom', TextType::class, $this->getConfiguration("Prénom", "Tapez le prénom de votre contact"))
            ->add('adresse' TextType::class, $this->getConfiguration("Adresse", "Tapez l'adresse de votre contact"))
            ->add('codePostal' IntegerType::class, $this->getConfiguration("Code Postal", "Tapez le code Postal de votre contact"))
            ->add('ville' TextType::class, $this->getConfiguration("Ville", "Tapez la ville de votre contact"))
            ->add('telephone')
            ->add('mail')
            ->add('avatar')
            ->add('categoriee')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
