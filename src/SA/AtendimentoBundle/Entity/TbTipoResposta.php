<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TbTipoResposta
 *
 * @ORM\Table(name="tb_tipo_resposta", indexes={@ORM\Index(name="fk_tipo_atendimento_codigo_idx", columns={"at_codigo"})})
 * @ORM\Entity
 */
class TbTipoResposta
{
    /**
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbTipoAtendimento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="at_codigo", referencedColumnName="at_codigo")
     * })
     * @Assert\NotBlank(message="Tipo de Atendimento é Obrigatório")
     */
    private $atCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="tir_titulo", type="string", length=255, nullable=true)
     */
    private $tirTitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="tir_descricao", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="Descrição é Obrigatório")
     */
    private $tirDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="tir_status", type="string", length=1, nullable=false)
     */
    private $tirStatus = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="tir_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tirCodigo;



    /**
     * Set atCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbTipoAtendimento $atCodigo
     *
     * @return TbTipoResposta
     */
    public function setAtCodigo(\SA\AtendimentoBundle\Entity\TbTipoAtendimento $atCodigo)
    {
        $this->atCodigo = $atCodigo;

        return $this;
    }

    /**
     * Get atCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbTipoAtendimento
     */
    public function getAtCodigo()
    {
        return $this->atCodigo;
    }

    /**
     * Set tirTitulo
     *
     * @param string $tirTitulo
     *
     * @return TbTipoResposta
     */
    public function setTirTitulo($tirTitulo)
    {
        $this->tirTitulo = $tirTitulo;

        return $this;
    }

    /**
     * Get tirTitulo
     *
     * @return string
     */
    public function getTirTitulo()
    {
        return $this->tirTitulo;
    }

    /**
     * Set tirDescricao
     *
     * @param string $tirDescricao
     *
     * @return TbTipoResposta
     */
    public function setTirDescricao($tirDescricao)
    {
        $this->tirDescricao = $tirDescricao;

        return $this;
    }

    /**
     * Get tirDescricao
     *
     * @return string
     */
    public function getTirDescricao()
    {
        return $this->tirDescricao;
    }

    /**
     * Set tirStatus
     *
     * @param string $tirStatus
     *
     * @return TbTipoResposta
     */
    public function setTirStatus($tirStatus)
    {
        $this->tirStatus = $tirStatus;

        return $this;
    }

    /**
     * Get tirStatus
     *
     * @return string
     */
    public function getTirStatus()
    {
        return $this->tirStatus;
    }

    /**
     * Get tirCodigo
     *
     * @return integer
     */
    public function getTirCodigo()
    {
        return $this->tirCodigo;
    }

    public function __toString()
    {
        return $this->tirDescricao;
    }

    public function getId()
    {
        return $this->getTirCodigo();
    }
}
