<?php

namespace SA\AtendimentoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TbTipoApontamentoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('tapTitulo',TextType::class,array('label'=>'Titulo'))
            ->add('atCodigo',null,array('label'=>'Tipo de Atendimento'))
            ->add('tapDescricao', TextareaType::class,array('label'=>'Descrição'))
            ->add('tapStatus',ChoiceType::class,array('label'=>'Status',
                'choices' => array('1'=>'Ativo','2'=>'Inativo')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\TbTipoApontamento'
        ));
    }
}
