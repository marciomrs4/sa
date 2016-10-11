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
use SA\AtendimentoBundle\Form\Listener\AddTipoResposta;
use Doctrine\ORM\EntityRepository;


class TbAtendimentoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // ->add('atDataRetorno', DateTimeType::class)
        // ->add('atDataCadastroReal', DateTimeType::class)
        //->add('usuCodigo')
        //->add('satCodigo')

        $builder
            ->add('atDataCadastro', DateType::class,['label'=> 'Data da Ocorrência',
                                                         'widget'=>'single_text',])
            ->add('atPaciente',null,['label'=>'Paciente'])
            ->add('atCpf',TextType::class,['label' => 'CPF'])
            ->add('atRg',TextType::class,['label' => 'RG'])
            ->add('atCns',TextType::class,['label'=>'CNS'])
            ->add('atReclamante',TextType::class,['label'=>'Reclamente'])
            ->add('atTeletone',TextType::class,['label'=>'Telefone'])
            ->add('ttpCodigo',EntityType::class,array(
                        'label'=>'Tipo de Processo',
                        'class' => 'SA\AtendimentoBundle\Entity\TbTipoProcesso',
                        'query_builder' => function(EntityRepository $er){
                            return $er->createQueryBuilder('TbTipoProcesso')
                                ->where('TbTipoProcesso.ttpStatus = :status')
                                ->orderBy('TbTipoProcesso.ttpDescricao')
                                ->setParameter('status',1);
                        },'placeholder'=>'Selecione'))
            ->add('atProcesso',TextType::class,['label'=>'Processo / Protocolo'])
            ->add('atMedicamento',TextareaType::class,['label'=>'Produto', 'attr' => ['rows' => '5']])
            ->add('taCodigo', EntityType::class,array(
                        'label'=>'Tipo de Atendimento',
                        'class' => 'SA\AtendimentoBundle\Entity\TbTipoAtendimento',
                        'query_builder' => function(EntityRepository $er){
                            return $er->createQueryBuilder('TbTipoAtendimento')
                                ->where('TbTipoAtendimento.atAtivo = :ativo')
                                ->orderBy('TbTipoAtendimento.atDescricao')
                                ->setParameter('ativo',1);
                    },'placeholder'=>'Selecione'))
            ->add('tipoResposta',ChoiceType::class,['choices_as_values' => true,
                                                    'mapped'=>false])
            ->add('tdCodigo',EntityType::class,array(
                        'label'=>'Direcionado Para',
                        'class' => 'SA\AtendimentoBundle\Entity\TbTipoDirecionamento',
                        'query_builder' => function(EntityRepository $er){
                            return $er->createQueryBuilder('TbTipoDirecionamento')
                                ->where('TbTipoDirecionamento.tdAtivo = :ativo')
                                ->orderBy('TbTipoDirecionamento.tdDescricao')
                                ->setParameter('ativo',1);
                        },'placeholder'=>'Selecione'))
            ->add('atDescricao',null,['label'=>'Descrição do Atendimento', 'attr' => ['rows' => '5']])
            ->add('atLocalidade',ChoiceType::class,['label'=>'Atendimento Interno',
                'attr'=>['class'=>'input-sm'],
                'choices' => [
                    'Não'=>0,
                    'Sim'=>1
                ],
                'choices_as_values' => true])
            ->add('tipoLigacao',EntityType::class,array(
                'label'=>'Tipo de ligação',
                'class'=>'SA\AtendimentoBundle\Entity\TipoLigacao',
                'attr'=>array('class'=>'input-sm'),
                'placeholder'=>'Selecione'))
        ;

        $builder->addEventSubscriber(new AddTipoResposta());

    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\TbAtendimento'
        ));
    }
}
