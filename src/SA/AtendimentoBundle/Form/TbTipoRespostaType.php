<?php

namespace SA\AtendimentoBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('atCodigo',EntityType::class,array('label'=>'Tipo Atendimento',
                    'class' => 'SA\AtendimentoBundle\Entity\TbTipoAtendimento'))
            ->add('tirTitulo')
            ->add('tirDescricao')
            ->add('tirStatus')
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
