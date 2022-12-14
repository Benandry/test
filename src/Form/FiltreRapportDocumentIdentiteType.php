<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltreRapportDocumentIdentiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('one_date_search',DateType::class,[
                'widget'=>'single_text',
                'mapped'=>true,
                'label'=>' ',
                'required' => false,
                ])
            ->add('Date1',DateType::class,[
                'widget'=>'single_text',
                'mapped'=>true,
                'label'=>'Du',
                'required' => false,
                ])

                ->add('Date2',DateType::class,[
                    'widget'=>'single_text',
                    'mapped'=>true,
                    'label'=>'Au',
                    'required' => false
            ])
            ->add('chercher',SubmitType::class,[
                'attr'=>[
                    'class'=>'btn btn-primary btn-sm'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
