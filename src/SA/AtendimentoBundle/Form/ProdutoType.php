<?php

namespace SA\AtendimentoBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProdutoType extends AbstractType
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
            ->add('codigoScodes',TextType::class,array(
                'label'=>'Código SCODES',
                'attr'=>array('class'=>'input-sm')))
            ->add('descricao',TextType::class,array(
                'label'=>'Descrição',
                'attr'=>array('class'=>'input-sm')))
            ->add('quantidade',IntegerType::class,array(
                'label'=>'Quantidade',
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
}
