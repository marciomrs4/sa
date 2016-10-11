<?php

namespace SA\AtendimentoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContatoAtendimentoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroTelefone',TextType::class,array(
                'attr'=>array('class'=>'input-sm telefone')))
            ->add('contato',TextType::class,array('attr'=>array('class'=>'input-sm')))
            ->add('tipoTelefone',ChoiceType::class,array(
                'label'=>'Tipo de Telefone',
                'choices' => array(
                    'Telefone Residencial'=>'Telefone Residêncial',
                    'Celular' => 'Celular'
                )
            ,'attr'=>array('class'=>'input-sm')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\ContatoAtendimento'
        ));
    }
}
