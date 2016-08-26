<?php
namespace SA\AtendimentoBundle\Form\Listener;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

class AddTipoRespostaApontamento implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preSubmit'
        );
    }

    public function preSetData(FormEvent $event)
    {
        $atendimento = $event->getData(); //data es un objeto AppBundle\Entity\User

        // Pasamos siempre el country así sea null
        // para que cuando sea un usuario nuevo, el listado de estados esté
        // vacio inicialmente, y solo se llene de items, cuando se ejecute el
        // ajax que obtiene los estados del pais seleccionado por el usuario.

        $tipoAtendimento = ($atendimento && $atendimento->getTapStatus())
            ? $atendimento->getTapStatus() : null; // Importante los parentesis al usar "and".

        // Es importante siempre verificar que el valor devuelto por $event->getData()
        // (que en este caso es $user) no sea null, porque no es obligatorio que al crear
        // el formulario, se le pase una instancia de User,
        // y si no se le pasa, User será nulo.

        $this->addField($event->getForm(),  $tipoAtendimento);
    }
    /**
     * Cuando el usuario llene los datos del formulario y haga el envío del mismo,
     * este método será ejecutado.
     */
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();

        $this->addField($event->getForm(), $data['atendimento']);
    }

    protected function addField(Form $form, $atendimento)
    {

        $form->add('tapCodigo',EntityType::class, array(
            'class' => 'SA\AtendimentoBundle\Entity\TbTipoApontamento',
            'query_builder' => function(EntityRepository $er) use ($atendimento){
                return $er->createQueryBuilder('TbTipoApontamento')
                    ->where('TbTipoApontamento.atCodigo != :tipoAntendimento')
                    ->orderBy('TbTipoApontamento.tapDescricao')
                    ->setParameter('tipoAntendimento', $atendimento);
            },
            'placeholder' => 'Selecione'
        ));
    }
}