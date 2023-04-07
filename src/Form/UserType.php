<?php 

namespace App\Form;

use App\Entity\User;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('token', TextType::class)
            ->add('date', TextType::class)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('gender', TextType::class)
            ->add('statut', TextType::class)
            ->add('company', TextType::class)
            ->add('city', TextType::class)
            ->add('zipcode', TextType::class)
            ->add('address1', TextType::class)
            ->add('address2', TextType::class)
            ->add('confirmed', CheckboxType::class)
            ->add('billing_email', EmailType::class)
            ->add('company_siret', TextType::class)
            ->add('company_tva', TextType::class)
            ->add('notify_ev', CheckboxType::class)
            ->add('notify_ar', CheckboxType::class)
            ->add('notify_rf', CheckboxType::class)
            ->add('notify_ng', CheckboxType::class)
            ->add('notify_consent', CheckboxType::class)
            ->add('notify_eidas_to_valid', CheckboxType::class)
            ->add('notify_recipient_update', CheckboxType::class)
            ->add('notify_waiting_ar_answer', CheckboxType::class)
            ->add('is_legal_entity', CheckboxType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class'         => User::class,
                'allow_extra_fields' => true,
                'csrf_protection'    => false,
            ]
        );
    }
}