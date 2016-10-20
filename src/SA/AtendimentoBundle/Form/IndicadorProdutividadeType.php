<?php

namespace SA\AtendimentoBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndicadorProdutividadeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataInicial',DateType::class,array(
                'label'=>'Data Inicial',
                'widget' => 'single_text',
                'attr'=>array('class'=>'input-sm'),
                'mapped' => false))
            ->add('dataFinal',DateType::class,array(
                'label'=>'Data Final',
                'widget' => 'single_text',
                'attr'=>array('class'=>'input-sm'),
                'mapped' => false))
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
        return 'indicador_produtividade';
    }
}
