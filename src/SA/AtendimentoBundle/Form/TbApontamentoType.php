<?php

namespace SA\AtendimentoBundle\Form;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use SA\AtendimentoBundle\Form\Listener\AddTipoRespostaApontamento;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class TbApontamentoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('tapCodigo',EntityType::class,array('mapped'=>false,
                                   'label'=>'Tipo de Apontamento',
                                   'attr'=>array('class'=>'input-sm'),
                                   'class'=>'SA\AtendimentoBundle\Entity\TbTipoApontamento',
                                   'query_builder' => function(EntityRepository $er){
                                       return $er->createQueryBuilder('TipoApontamento');
                                   },
                                   'placeholder' => 'Selecione'))
            ->add('apDescricao',TextareaType::class,array('label'=>'Descrição'))
            ->add('tdCodigo',EntityType::class,array('mapped'=>false,
                                                     'label'=>'Direcionar Para',
                                                     'attr'=>array('class'=>'input-sm'),
                                                     'class'=>'SA\AtendimentoBundle\Entity\TbTipoDirecionamento',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('TD')
                        ->where('TD.tdAtivo = :ativo')
                        ->setParameter('ativo',1);
                }
                                                        ))
            ->add('satCodigo',EntityType::class,array('mapped'=>false,
                                                      'label'=>'Status',
                                                      'attr'=>array('class'=>'input-sm'),
                                                      'class' => 'SA\AtendimentoBundle\Entity\TbStatusAtendimento',
                                                      'query_builder'=> function(EntityRepository $er){
                                                    return $er->createQueryBuilder('StatusAtendimento')
                                                        ->where('StatusAtendimento.satCodigo > :codigo')
                                                        ->setParameter('codigo',1);
                                                    }))
            ->add('apDataRetorno',DateType::class,array('label'=>'Data do Retorno',
                                                        'widget'=>'single_text',
                                                        'attr'=>array('class'=>'input-sm')))

            ;


    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\TbApontamento'
        ));
    }

    public function getBlockPrefix()
    {
        return 'apontamento';
    }
}
