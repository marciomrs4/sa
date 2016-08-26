<?php

namespace SA\AtendimentoBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TbUsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usuNome',TextType::class,array('label' => 'Nome',
                'attr' => array('class'=>'input-sm')))
            ->add('usuSobrenome',TextType::class,array('label'=>'Sobre Nome',
                'attr' => array('class'=>'input-sm')))
            ->add('usuEmail',TextType::class,array('label'=>'Email',
                'attr' => array('class'=>'input-sm')))
            ->add('usuRamal',TextType::class,array('label'=>'Ramal',
                'attr' => array('class'=>'input-sm')))
            ->add('usuCargo',TextType::class,array('label'=>'Cargo',
                'attr' => array('class'=>'input-sm')))
            ->add('usuDrt',TextType::class,array('label'=>'DRT',
                'attr' => array('class'=>'input-sm')))
            ->add('usuPermiteAtedimento',TextType::class,array('label'=>'Permite listar no Atendimento',
                'attr' => array('class'=>'input-sm')))
            ->add('tacCodigo',EntityType::class,array('label'=>'Tipo de acesso',
                'attr' => array('class'=>'input-sm'),
                'class'=> 'SA\AtendimentoBundle\Entity\TbTipoAcesso',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('TipoAcesso')
                        ->where('TipoAcesso.tacCodigo > 1')
                        ->orderBy('TipoAcesso.tacDescricao');
                    },
                'placeholder' => 'Selecione'))
            ->add('depCodigo',EntityType::class,array('label'=>'Departamento',
                'class'=> 'SA\AtendimentoBundle\Entity\TbDepartamento',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('Departamento')
                        ->where('Departamento.depCodigo > 1')
                        ->orderBy('Departamento.depDescricao');
                    },
                'placeholder' => 'Selecione'));

    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SA\AtendimentoBundle\Entity\TbUsuario'
        ));
    }
}
