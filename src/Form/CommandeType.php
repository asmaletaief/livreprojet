<?php
namespace App\Form;
use App\Entity\Commande;
use App\Entity\User;
use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_commande')
            ->add('date_livraison')
            ->add('quantite')
            ->add('prix_total')
            ->add('livre', EntityType::class, [
                'class' => Livre::class, // Use the correct class reference
                'multiple' => true, // Other options...
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'multiple' => false,
                // ...
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
