<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbAtendenteSolicitacao
 *
 * @ORM\Table(name="tb_atendente_solicitacao", indexes={@ORM\Index(name="pk_usuario", columns={"usu_codigo_atendente"}), @ORM\Index(name="pk_solicitcao", columns={"sol_codigo"}), @ORM\Index(name="pk_prioridade", columns={"pri_codigo"})})
 * @ORM\Entity
 */
class TbAtendenteSolicitacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ats_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $atsCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbUsuario
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="SA\AtendimentoBundle\Entity\TbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usu_codigo_atendente", referencedColumnName="usu_codigo")
     * })
     */
    private $usuCodigoAtendente;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbSolicitacao
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="SA\AtendimentoBundle\Entity\TbSolicitacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sol_codigo", referencedColumnName="sol_codigo")
     * })
     */
    private $solCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbPrioridade
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="SA\AtendimentoBundle\Entity\TbPrioridade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pri_codigo", referencedColumnName="pri_codigo")
     * })
     */
    private $priCodigo;



    /**
     * Set atsCodigo
     *
     * @param integer $atsCodigo
     *
     * @return TbAtendenteSolicitacao
     */
    public function setAtsCodigo($atsCodigo)
    {
        $this->atsCodigo = $atsCodigo;

        return $this;
    }

    /**
     * Get atsCodigo
     *
     * @return integer
     */
    public function getAtsCodigo()
    {
        return $this->atsCodigo;
    }

    /**
     * Set usuCodigoAtendente
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuCodigoAtendente
     *
     * @return TbAtendenteSolicitacao
     */
    public function setUsuCodigoAtendente(\SA\AtendimentoBundle\Entity\TbUsuario $usuCodigoAtendente)
    {
        $this->usuCodigoAtendente = $usuCodigoAtendente;

        return $this;
    }

    /**
     * Get usuCodigoAtendente
     *
     * @return \SA\AtendimentoBundle\Entity\TbUsuario
     */
    public function getUsuCodigoAtendente()
    {
        return $this->usuCodigoAtendente;
    }

    /**
     * Set solCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbSolicitacao $solCodigo
     *
     * @return TbAtendenteSolicitacao
     */
    public function setSolCodigo(\SA\AtendimentoBundle\Entity\TbSolicitacao $solCodigo)
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

    /**
     * Set priCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbPrioridade $priCodigo
     *
     * @return TbAtendenteSolicitacao
     */
    public function setPriCodigo(\SA\AtendimentoBundle\Entity\TbPrioridade $priCodigo)
    {
        $this->priCodigo = $priCodigo;

        return $this;
    }

    /**
     * Get priCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbPrioridade
     */
    public function getPriCodigo()
    {
        return $this->priCodigo;
    }
}
