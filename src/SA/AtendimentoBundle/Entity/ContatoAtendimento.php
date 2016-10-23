<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContatoAtendimento
 *
 * @ORM\Table(name="contato_atendimento", indexes={@ORM\Index(name="fk_contato_atendimento_id_idx", columns={"atendimento_id"})})
 * @ORM\Entity
 */
class ContatoAtendimento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="atendimento_id", type="integer", nullable=false)
     */
    private $atendimentoId;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_telefone", type="string", length=45, nullable=false)
     */
    private $numeroTelefone;

    /**
     * @var string
     *
     * @ORM\Column(name="contato", type="string", length=45, nullable=true)
     */
    private $contato;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_telefone", type="string", length=45, nullable=false)
     */
    private $tipoTelefone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_criacao", type="datetime", nullable=false)
     */
    private $dateCriacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_update", type="datetime", nullable=true)
     */
    private $dateUpdate;

    /**
     * @var string
     *
     * @ORM\Column(name="user_creator", type="string", length=255, nullable=false)
     */
    private $userCreator;

    /**
     * @var string
     *
     * @ORM\Column(name="user_update", type="string", length=255, nullable=true)
     */
    private $userUpdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getDateCriacao()
    {
        return $this->dateCriacao;
    }

    /**
     * @param mixed $dateCriacao
     * @return ContatoAtendimento
     */
    public function setDateCriacao($dateCriacao)
    {
        $this->dateCriacao = $dateCriacao;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * @param \DateTime $dateUpdate
     * @return ContatoAtendimento
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserCreator()
    {
        return $this->userCreator;
    }

    /**
     * @param mixed $userCreator
     * @return ContatoAtendimento
     */
    public function setUserCreator($userCreator)
    {
        $this->userCreator = $userCreator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserUpdate()
    {
        return $this->userUpdate;
    }

    /**
     * @param mixed $userUpdate
     * @return ContatoAtendimento
     */
    public function setUserUpdate($userUpdate)
    {
        $this->userUpdate = $userUpdate;
        return $this;
    }


    /**
     * Set atendimentoId
     *
     * @param integer $atendimentoId
     *
     * @return ContatoAtendimento
     */
    public function setAtendimentoId($atendimentoId)
    {
        $this->atendimentoId = $atendimentoId;

        return $this;
    }

    /**
     * Get atendimentoId
     *
     * @return integer
     */
    public function getAtendimentoId()
    {
        return $this->atendimentoId;
    }

    /**
     * Set numeroTelefone
     *
     * @param string $numeroTelefone
     *
     * @return ContatoAtendimento
     */
    public function setNumeroTelefone($numeroTelefone)
    {
        $this->numeroTelefone = $numeroTelefone;

        return $this;
    }

    /**
     * Get numeroTelefone
     *
     * @return string
     */
    public function getNumeroTelefone()
    {
        return $this->numeroTelefone;
    }

    /**
     * Set contato
     *
     * @param string $contato
     *
     * @return ContatoAtendimento
     */
    public function setContato($contato)
    {
        $this->contato = $contato;

        return $this;
    }

    /**
     * Get contato
     *
     * @return string
     */
    public function getContato()
    {
        return $this->contato;
    }

    /**
     * Set tipoTelefone
     *
     * @param string $tipoTelefone
     *
     * @return ContatoAtendimento
     */
    public function setTipoTelefone($tipoTelefone)
    {
        $this->tipoTelefone = $tipoTelefone;

        return $this;
    }

    /**
     * Get tipoTelefone
     *
     * @return string
     */
    public function getTipoTelefone()
    {
        return $this->tipoTelefone;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
