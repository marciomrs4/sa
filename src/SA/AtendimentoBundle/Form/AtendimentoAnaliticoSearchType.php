<?php

namespace SA\AtendimentoBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\Date;


class AtendimentoAnaliticoSearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('satCodigo',null,['label'=>'Status',
                                    'attr' => ['class'=>'input-sm'],
                                    'placeholder' => 'Todos'])
            ->add('taCodigo', EntityType::class,array(
                'label'=>'Tipo de Atendimento',
                'attr'=>['class'=>'input-sm'],
                'class' => 'SA\AtendimentoBundle\Entity\TbTipoAtendimento',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('TbTipoAtendimento')
                        ->where('TbTipoAtendimento.atAtivo = :ativo')
                        ->orderBy('TbTipoAtendimento.atDescricao')
                        ->setParameter('ativo',1);
                },'placeholder'=>'Todos'))
            ->add('atDataRetornoA', DateType::class,['label'=> 'Data de Atendimento - Inicio',
                                                     'attr'=>['class'=>'input-sm'],
                                                         'mapped' => false,
                                                         'widget' => 'single_text'])
            ->add('atDataRetornoB', DateType::class,['label'=> 'Data de Atendimento - Fim',
                                                     'attr'=>['class'=>'input-sm'],
                                                         'mapped' => false,
                                                         'widget' => 'single_text']);


    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\TbAtendimento',
            'validation_groups' => false
        ));
    }

    public function getBlockPrefix()
    {
        return 'atendimento_analitico';
    }
}
