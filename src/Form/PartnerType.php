<?php

namespace App\Form;

use App\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'attr'=> array('type'=>'text','class'=>'color-input'),
                'label' => 'Nom',
            ))
            ->add('url', TextType::class, array(
                'attr'=> array('type'=>'text','class'=>'color-input'),
                'label'=>'Lien',
            ))

            ->add('pictureFile',VichImageType::class, array('required' => true,
                'download_link' => false,
                'allow_delete' => false,
                'label' => ' ',
                'attr'=>array('aria-describedby'=>'fileHelp','class'=>'form-control-file')
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Partner::class,
        ]);
    }
}
