<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * TbApontamento
 *
 * @ORM\Table(name="tb_apontamento", indexes={@ORM\Index(name="fk_usuario_apontamento", columns={"usu_codigo"}), @ORM\Index(name="fk_atendimento", columns={"at_codigo"})})
 * @ORM\Entity(repositoryClass="SA\AtendimentoBundle\Repository\ApontamentoRepository")
 */
class TbApontamento
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ap_data_apontamento", type="datetime", nullable=false)
     */
    private $apDataApontamento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ap_data_retorno", type="date", nullable=false)
     */
    private $apDataRetorno;

    /**
     * @var string
     *
     * @ORM\Column(name="ap_descricao", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="A descrição é obrigatória.")
     */
    private $apDescricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="ap_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $apCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbUsuario
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usu_codigo", referencedColumnName="usu_codigo")
     * })
     */
    private $usuCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TipoLigacao
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TipoLigacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_ligacao", referencedColumnName="id")
     * })
     * @Assert\NotBlank(message="Selecione o tipo de ligação")
     */
    private $tipoLigacao;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbAtendimento
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbAtendimento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="at_codigo", referencedColumnName="at_codigo")
     * })
     */
    private $atCodigo;


//    public function __construct()
//    {
//        $this->apDataApontamento = new \DateTime('now');
//    }


    /**
     * Set apDataApontamento
     *
     * @param \DateTime $apDataApontamento
     *
     * @return TbApontamento
     */
    public function setApDataApontamento($apDataApontamento)
    {
        $this->apDataApontamento = $apDataApontamento;

        return $this;
    }

    /**
     * Get apDataApontamento
     *
     * @return \DateTime
     */
    public function getApDataApontamento()
    {
        return $this->apDataApontamento;
    }

    /**
     * Set apDataRetorno
     *
     * @param \DateTime $apDataRetorno
     *
     * @return TbApontamento
     */
    public function setApDataRetorno($apDataRetorno)
    {
        $this->apDataRetorno = $apDataRetorno;

        return $this;
    }

    /**
     * Get apDataRetorno
     *
     * @return \DateTime
     */
    public function getApDataRetorno()
    {
        return $this->apDataRetorno;
    }

    /**
     * Set apDescricao
     *
     * @param string $apDescricao
     *
     * @return TbApontamento
     */
    public function setApDescricao($apDescricao)
    {
        $this->apDescricao = $apDescricao;

        return $this;
    }

    /**
     * Get apDescricao
     *
     * @return string
     */
    public function getApDescricao()
    {
        return $this->apDescricao;
    }

    /**
     * Get apCodigo
     *
     * @return integer
     */
    public function getApCodigo()
    {
        return $this->apCodigo;
    }

    /**
     * Set usuCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo
     *
     * @return TbApontamento
     */
    public function setUsuCodigo(\SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo = null)
    {
        $this->usuCodigo = $usuCodigo;

        return $this;
    }

    /**
     * Get usuCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbUsuario
     */
    public function getUsuCodigo()
    {
        return $this->usuCodigo;
    }

    /**
     * Set atCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbAtendimento $atCodigo
     *
     * @return TbApontamento
     */
    public function setAtCodigo(\SA\AtendimentoBundle\Entity\TbAtendimento $atCodigo = null)
    {
        $this->atCodigo = $atCodigo;

        return $this;
    }

    /**
     * Get atCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbAtendimento
     */
    public function getAtCodigo()
    {
        return $this->atCodigo;
    }

    public function getId()
    {
        return $this->getApCodigo();
    }

    /**
     * Set tipoLigacao
     *
     * @param \SA\AtendimentoBundle\Entity\TipoLigacao $tipoLigacao
     *
     * @return TbApontamento
     */
    public function setTipoLigacao(\SA\AtendimentoBundle\Entity\TipoLigacao $tipoLigacao = null)
    {
        $this->tipoLigacao = $tipoLigacao;

        return $this;
    }

    /**
     * Get tipoLigacao
     *
     * @return \SA\AtendimentoBundle\Entity\TipoLigacao
     */
    public function getTipoLigacao()
    {
        return $this->tipoLigacao;
    }
}
