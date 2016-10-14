<?php

namespace SA\AtendimentoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApontamentoProdutoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descricao',TextareaType::class,array(
                'label'=>'Descrição'))
            ->add('tipoLigacao',EntityType::class,array(
                'label'=> 'Tipo de ligação',
                'attr' => array('class' => 'input-sm'),
                'class'=>'SA\AtendimentoBundle\Entity\TipoLigacao',
                'placeholder'=>'Selecione'
            ))
            ->add('status',EntityType::class,array(
                'label'=>'Status',
                'attr'=> array('class'=>'input-sm'),
                'class'=>'SA\AtendimentoBundle\Entity\StatusProduto',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('s')
                        ->where('s.id > :valor')
                        ->setParameter('valor',1);
                }))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\ApontamentoProduto'
        ));
    }
}
