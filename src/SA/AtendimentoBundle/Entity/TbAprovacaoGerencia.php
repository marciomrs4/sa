<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbAprovacaoGerencia
 *
 * @ORM\Table(name="tb_aprovacao_gerencia", indexes={@ORM\Index(name="fk_pro", columns={"pro_codigo_projeto"})})
 * @ORM\Entity
 */
class TbAprovacaoGerencia
{
    /**
     * @var string
     *
     * @ORM\Column(name="apr_status", type="string", length=1, nullable=true)
     */
    private $aprStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="usu_codigo_gerencia", type="integer", nullable=true)
     */
    private $usuCodigoGerencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="apr_data_aprovado", type="datetime", nullable=true)
     */
    private $aprDataAprovado;

    /**
     * @var integer
     *
     * @ORM\Column(name="apr_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aprCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbProjeto
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbProjeto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_codigo_projeto", referencedColumnName="pro_codigo")
     * })
     */
    private $proCodigoProjeto;



    /**
     * Set aprStatus
     *
     * @param string $aprStatus
     *
     * @return TbAprovacaoGerencia
     */
    public function setAprStatus($aprStatus)
    {
        $this->aprStatus = $aprStatus;

        return $this;
    }

    /**
     * Get aprStatus
     *
     * @return string
     */
    public function getAprStatus()
    {
        return $this->aprStatus;
    }

    /**
     * Set usuCodigoGerencia
     *
     * @param integer $usuCodigoGerencia
     *
     * @return TbAprovacaoGerencia
     */
    public function setUsuCodigoGerencia($usuCodigoGerencia)
    {
        $this->usuCodigoGerencia = $usuCodigoGerencia;

        return $this;
    }

    /**
     * Get usuCodigoGerencia
     *
     * @return integer
     */
    public function getUsuCodigoGerencia()
    {
        return $this->usuCodigoGerencia;
    }

    /**
     * Set aprDataAprovado
     *
     * @param \DateTime $aprDataAprovado
     *
     * @return TbAprovacaoGerencia
     */
    public function setAprDataAprovado($aprDataAprovado)
    {
        $this->aprDataAprovado = $aprDataAprovado;

        return $this;
    }

    /**
     * Get aprDataAprovado
     *
     * @return \DateTime
     */
    public function getAprDataAprovado()
    {
        return $this->aprDataAprovado;
    }

    /**
     * Get aprCodigo
     *
     * @return integer
     */
    public function getAprCodigo()
    {
        return $this->aprCodigo;
    }

    /**
     * Set proCodigoProjeto
     *
     * @param \SA\AtendimentoBundle\Entity\TbProjeto $proCodigoProjeto
     *
     * @return TbAprovacaoGerencia
     */
    public function setProCodigoProjeto(\SA\AtendimentoBundle\Entity\TbProjeto $proCodigoProjeto = null)
    {
        $this->proCodigoProjeto = $proCodigoProjeto;

        return $this;
    }

    /**
     * Get proCodigoProjeto
     *
     * @return \SA\AtendimentoBundle\Entity\TbProjeto
     */
    public function getProCodigoProjeto()
    {
        return $this->proCodigoProjeto;
    }
}
