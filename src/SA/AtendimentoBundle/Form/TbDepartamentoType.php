<?php

namespace SA\AtendimentoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TbDepartamentoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('depDescricao',null,array('label' => 'Descriçao'))
            ->add('depEmail',null,array('label' => 'E-mail'))
            ->add('proPermiteListarChamado',null,array('label'=>'Permite listar no chamado'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\TbDepartamento'
        ));
    }
}
