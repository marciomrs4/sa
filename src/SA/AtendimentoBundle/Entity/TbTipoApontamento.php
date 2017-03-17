<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * TbTipoApontamento
 *
 * @ORM\Table(name="tb_tipo_apontamento", indexes={@ORM\Index(name="fk_tipo_apontamento_atendimento_idx", columns={"at_codigo"})})
 * @ORM\Entity(repositoryClass="SA\AtendimentoBundle\Repository\TipoApontamentoRepository")
 */
class TbTipoApontamento
{
     /**
     * @var \SA\AtendimentoBundle\Entity\TbAtendimento
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbTipoAtendimento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="at_codigo", referencedColumnName="at_codigo")
     * })
     */
    private $atCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="tap_titulo", type="string", length=255, nullable=true)
     */
    private $tapTitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="tap_descricao", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="Descrição é Obrigatório")
     */
    private $tapDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="tap_status", type="string", length=1, nullable=false)
     */
    private $tapStatus = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="tap_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tapCodigo;



    /**
     * Set atCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbTipoAtendimento $atCodigo
     *
     * @return TbTipoApontamento
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
     * Set tapTitulo
     *
     * @param string $tapTitulo
     *
     * @return TbTipoApontamento
     */
    public function setTapTitulo($tapTitulo)
    {
        $this->tapTitulo = $tapTitulo;

        return $this;
    }

    /**
     * Get tapTitulo
     *
     * @return string
     */
    public function getTapTitulo()
    {
        return $this->tapTitulo;
    }

    /**
     * Set tapDescricao
     *
     * @param string $tapDescricao
     *
     * @return TbTipoApontamento
     */
    public function setTapDescricao($tapDescricao)
    {
        $this->tapDescricao = $tapDescricao;

        return $this;
    }

    /**
     * Get tapDescricao
     *
     * @return string
     */
    public function getTapDescricao()
    {
        return $this->tapDescricao;
    }

    /**
     * Set tapStatus
     *
     * @param string $tapStatus
     *
     * @return TbTipoApontamento
     */
    public function setTapStatus($tapStatus)
    {
        $this->tapStatus = $tapStatus;

        return $this;
    }

    /**
     * Get tapStatus
     *
     * @return string
     */
    public function getTapStatus()
    {
        return $this->tapStatus;
    }

    /**
     * Get tapCodigo
     *
     * @return integer
     */
    public function getTapCodigo()
    {
        return $this->tapCodigo;
    }

    public function __toString()
    {
        return $this->getTapDescricao();
    }

    public function getId()
    {
        return $this->getTapCodigo();
    }

}
