<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbCalculoAtendimento
 *
 * @ORM\Table(name="tb_calculo_atendimento", indexes={@ORM\Index(name="fk_soli", columns={"sol_codigo"}), @ORM\Index(name="fk_tb_calculo_atendimento_tb_usuario1", columns={"usu_codigo"}), @ORM\Index(name="fk_tb_calculo_atendimento_tb_status1", columns={"sta_codigo"})})
 * @ORM\Entity
 */
class TbCalculoAtendimento
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tea_data_acao", type="datetime", nullable=false)
     */
    private $teaDataAcao = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="tea_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $teaCodigo;

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
     * @var \SA\AtendimentoBundle\Entity\TbStatus
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sta_codigo", referencedColumnName="sta_codigo")
     * })
     */
    private $staCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbSolicitacao
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbSolicitacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sol_codigo", referencedColumnName="sol_codigo")
     * })
     */
    private $solCodigo;



    /**
     * Set teaDataAcao
     *
     * @param \DateTime $teaDataAcao
     *
     * @return TbCalculoAtendimento
     */
    public function setTeaDataAcao($teaDataAcao)
    {
        $this->teaDataAcao = $teaDataAcao;

        return $this;
    }

    /**
     * Get teaDataAcao
     *
     * @return \DateTime
     */
    public function getTeaDataAcao()
    {
        return $this->teaDataAcao;
    }

    /**
     * Get teaCodigo
     *
     * @return integer
     */
    public function getTeaCodigo()
    {
        return $this->teaCodigo;
    }

    /**
     * Set usuCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo
     *
     * @return TbCalculoAtendimento
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
     * Set staCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbStatus $staCodigo
     *
     * @return TbCalculoAtendimento
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
     * Set solCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbSolicitacao $solCodigo
     *
     * @return TbCalculoAtendimento
     */
    public function setSolCodigo(\SA\AtendimentoBundle\Entity\TbSolicitacao $solCodigo = null)
    {
        $this->solCodigo = $solCodigo;

        return $this;
    }

    /**
     * Get solCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbSolicitacao
     */
    public function getSolCodigo()
    {
        return $this->solCodigo;
    }
}
