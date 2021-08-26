<?php

namespace App\Form;

use App\Entity\Technologie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Kpi;
use App\Entity\Famille;
use App\Entity\Statut;
use App\Entity\Porteur;
use App\Entity\Delai;
use App\Entity\Vr;
use App\Entity\AtteinteVr;

class TechnologieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('probleme',TextareaType::class)
            ->add('planMaitrise',TextareaType::class)
            ->add('ticket',TextareaType::class)
            ->add('nomKpi',EntityType::class, 
                    array(
                            'class' => Kpi::class,
                            'choice_label' => 'nomkpi',
                            'required'   => false,    
                        ))
            ->add('nomFamille',EntityType::class, 
                    array(
                            'class' => Famille::class,
                            'choice_label' => 'nomfamille',
                            'required'   => false,     
                        ))
            ->add('optionOk',EntityType::class, 
                    array(
                            'class' => Statut::class,
                            'choice_label' => 'optionOk',
                            'required'   => false,     
                        ))
            ->add('nomPorteur',EntityType::class, 
                    array(
                            'class' => Porteur::class,
                            'choice_label' => 'nomPorteur',
                            'required'   => false,     
                        ))
            ->add('delai',EntityType::class, 
                    array(
                            'class' => Delai::class,
                            'choice_label' => 'delai',
                            'required'   => false,     
                        ))
            ->add('nomVr',EntityType::class, 
                    array(
                            'class' => Vr::class,
                            'choice_label' => 'nom_vr',
                            'required'   => false,     
                        ))
            ->add('optionVr',EntityType::class, 
                    array(
                            'class' => AtteinteVr::class,
                            'choice_label' => 'optionVr',
                            'required'   => false,     
                        ))
            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Technologie::class,
        ]);
    }
}
