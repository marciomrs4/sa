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


class TbAtendimentoSearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('satCodigo',null,['label'=>'Status',
                                    'attr' => ['class'=>'input-sm']])
            ->add('taCodigo', EntityType::class,array(
                'label'=>'Tipo de Atendimento',
                'attr'=>['class'=>'input-sm'],
                'class' => 'SA\AtendimentoBundle\Entity\TbTipoAtendimento',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('TbTipoAtendimento')
                        ->where('TbTipoAtendimento.atAtivo = :ativo')
                        ->orderBy('TbTipoAtendimento.atDescricao')
                        ->setParameter('ativo',1);
                },'placeholder'=>'Selecione'))
            ->add('usuCodigo',EntityType::class,array('label'=>'Atendente',
                                         'attr'=>['class'=>'input-sm'],
                    'class' => 'SA\AtendimentoBundle\Entity\TbUsuario',
                    'query_builder' => function(EntityRepository $er){
                        return $er->createQueryBuilder('U')
                            ->where('U.usuPermiteAtedimento = :status')
                            ->andWhere('U.usuCodigo > 1')
                            ->orderBy('U.usuNome')
                            ->setParameter('status','S');
                    },'placeholder' => 'Selecione'))
            ->add('tdCodigo',EntityType::class,array(
                'label'=>'Direcionado Para',
                'attr'=>['class'=>'input-sm'],
                'class' => 'SA\AtendimentoBundle\Entity\TbTipoDirecionamento',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('TbTipoDirecionamento')
                        ->where('TbTipoDirecionamento.tdAtivo = :ativo')
                        ->orderBy('TbTipoDirecionamento.tdDescricao')
                        ->setParameter('ativo',1);
                },'placeholder'=>'Selecione'))
            ->add('atDataRetornoA', DateType::class,['label'=> 'Data Retorno: Inicial',
                                                     'attr'=>['class'=>'input-sm'],
                                                         'mapped' => false,
                                                         'widget' => 'single_text'])
            ->add('atDataRetornoB', DateType::class,['label'=> 'Data Retorno: Final',
                                                     'attr'=>['class'=>'input-sm'],
                                                         'mapped' => false,
                                                         'widget' => 'single_text'])
            ->add('atPaciente',null,['label'=>'Paciente',
                                     'attr'=>['class'=>'input-sm']])
            ->add('ttpCodigo',EntityType::class,array(
                'label'=>'Tipo de Processo',
                'attr'=>['class'=>'input-sm'],
                'class' => 'SA\AtendimentoBundle\Entity\TbTipoProcesso',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('TbTipoProcesso')
                        ->where('TbTipoProcesso.ttpStatus = :status')
                        ->orderBy('TbTipoProcesso.ttpDescricao')
                        ->setParameter('status',1);
                },'placeholder'=>'Selecione'))
            ->add('atLocalidade',ChoiceType::class,['label'=>'Atendimento Interno',
                                                    'attr'=>['class'=>'input-sm'],
                                                    'choices' => [
                                                        'Não'=>0,
                                                        'Sim'=>1
                                                    ],
                                                   'choices_as_values' => true])
            ->add('atProcesso',TextType::class,['label'=>'Protocolo',
                                                'attr'=>['class'=>'input-sm']])
            ->add('atMedicamento',TextType::class,['label'=>'Produto',
                                                   'attr'=>['class'=>'input-sm']])

        ;


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
        return 'search_atendimento';
    }
}
