<?php

namespace SA\AtendimentoBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TbTipoRespostaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('atCodigo',null,array('label'=>'Tipo de Atendimento'))
            //->add('tirTitulo',TextType::class,array('label'=>'Titulo'))
            ->add('tirDescricao',TextType::class,array('label'=>'Descrição'))
            ->add('tirStatus',ChoiceType::class,array('label'=>'Status',
                  'choices'=>array('1'=>'Ativo','0'=>'Inativo')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\TbTipoResposta'
        ));
    }
}
