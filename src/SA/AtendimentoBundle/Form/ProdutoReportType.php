<?php

namespace SA\AtendimentoBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProdutoReportType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigoTp',TextType::class,array(
                'label'=>'Código TP',
                'attr'=>array('class'=>'input-sm')))
            ->add('descricao',TextType::class,array(
                'label'=>'Descrição',
                'attr'=>array('class'=>'input-sm')))
            ->add('status',EntityType::class,array(
                'class' => 'SA\AtendimentoBundle\Entity\StatusProduto',
                'attr' => array('class'=>'input-sm'),
                'placeholder'=>''))
            ->add('dataInicial',DateType::class,array('mapped'=>false,
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
            'data_class' => 'SA\AtendimentoBundle\Entity\Produto'
        ));
    }

    public function getBlockPrefix()
    {
        return 'report_produto';
    }
}
