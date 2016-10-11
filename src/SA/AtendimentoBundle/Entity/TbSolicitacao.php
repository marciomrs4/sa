<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbSolicitacao
 *
 * @ORM\Table(name="tb_solicitacao", indexes={@ORM\Index(name="fk_status_solicitacao", columns={"sta_codigo"}), @ORM\Index(name="fk_problema", columns={"pro_codigo"})})
 * @ORM\Entity
 */
class TbSolicitacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="usu_codigo_solicitante", type="integer", nullable=true)
     */
    private $usuCodigoSolicitante;

    /**
     * @var integer
     *
     * @ORM\Column(name="dep_codigo_solicitado", type="integer", nullable=true)
     */
    private $depCodigoSolicitado;

    /**
     * @var string
     *
     * @ORM\Column(name="sol_descricao_solicitacao", type="text", length=65535, nullable=true)
     */
    private $solDescricaoSolicitacao;

    /**
     * @var integer
     *
     * @ORM\Column(name="sol_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $solCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbStatus
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sta_codigo", referencedColumnName="sta_codigo")
     * })
     */
    private $staCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbProblema
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbProblema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_codigo", referencedColumnName="pro_codigo")
     * })
     */
    private $proCodigo;



    /**
     * Set usuCodigoSolicitante
     *
     * @param integer $usuCodigoSolicitante
     *
     * @return TbSolicitacao
     */
    public function setUsuCodigoSolicitante($usuCodigoSolicitante)
    {
        $this->usuCodigoSolicitante = $usuCodigoSolicitante;

        return $this;
    }

    /**
     * Get usuCodigoSolicitante
     *
     * @return integer
     */
    public function getUsuCodigoSolicitante()
    {
        return $this->usuCodigoSolicitante;
    }

    /**
     * Set depCodigoSolicitado
     *
     * @param integer $depCodigoSolicitado
     *
     * @return TbSolicitacao
     */
    public function setDepCodigoSolicitado($depCodigoSolicitado)
    {
        $this->depCodigoSolicitado = $depCodigoSolicitado;

        return $this;
    }

    /**
     * Get depCodigoSolicitado
     *
     * @return integer
     */
    public function getDepCodigoSolicitado()
    {
        return $this->depCodigoSolicitado;
    }

    /**
     * Set solDescricaoSolicitacao
     *
     * @param string $solDescricaoSolicitacao
     *
     * @return TbSolicitacao
     */
    public function setSolDescricaoSolicitacao($solDescricaoSolicitacao)
    {
        $this->solDescricaoSolicitacao = $solDescricaoSolicitacao;

        return $this;
    }

    /**
     * Get solDescricaoSolicitacao
     *
     * @return string
     */
    public function getSolDescricaoSolicitacao()
    {
        return $this->solDescricaoSolicitacao;
    }

    /**
     * Get solCodigo
     *
     * @return integer
     */
    public function getSolCodigo()
    {
        return $this->solCodigo;
    }

    /**
     * Set staCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbStatus $staCodigo
     *
     * @return TbSolicitacao
     */
    public function setStaCodigo(\SA\AtendimentoBundle\Entity\TbStatus $staCodigo = null)
    {
        $this->staCodigo = $staCodigo;

        return $this;
    }

    /**
     * Get staCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbStatus
     */
    public function getStaCodigo()
    {
        return $this->staCodigo;
    }

    /**
     * Set proCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbProblema $proCodigo
     *
     * @return TbSolicitacao
     */
    public function setProCodigo(\SA\AtendimentoBundle\Entity\TbProblema $proCodigo = null)
    {
        $this->proCodigo = $proCodigo;

        return $this;
    }

    /**
     * Get proCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbProblema
     */
    public function getProCodigo()
    {
        return $this->proCodigo;
    }
}
