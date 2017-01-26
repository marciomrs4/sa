<?php

namespace SA\AtendimentoBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicamentoReportType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('satCodigo',null,array(
                'label'=>'Status',
                'attr'=>array('class'=>'input-sm'),
                'placeholder'=>''))
            ->add('atMedicamento',TextType::class,array(
                'label' => 'Descrição do Produto',
                'attr' => array('class'=>'input-sm')))
            ->add('dataInicial',DateType::class,array(
                'mapped'=>false,
                'widget' => 'single_text',
                'attr'=>array('class'=>'input-sm')))
            ->add('dataFinal',DateType::class,array('mapped'=>false,
                'widget' => 'single_text',
                'attr'=>array('class'=>'input-sm')))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\TbAtendimento'
        ));
    }

    public function getBlockPrefix()
    {
        return 'medicamento_report';
    }
}
