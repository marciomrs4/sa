<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbAssentamento
 *
 * @ORM\Table(name="tb_assentamento", indexes={@ORM\Index(name="fk", columns={"sol_codigo"}), @ORM\Index(name="fk_usuario", columns={"usu_codigo"}), @ORM\Index(name="fk_", columns={"sol_codigo"}), @ORM\Index(name="fk_sol", columns={"sol_codigo"})})
 * @ORM\Entity
 */
class TbAssentamento
{
    /**
     * @var string
     *
     * @ORM\Column(name="ass_descricao", type="text", length=65535, nullable=false)
     */
    private $assDescricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ass_data_cadastro", type="datetime", nullable=false)
     */
    private $assDataCadastro = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="ass_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $assCodigo;

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
     * @var \SA\AtendimentoBundle\Entity\TbSolicitacao
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbSolicitacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sol_codigo", referencedColumnName="sol_codigo")
     * })
     */
    private $solCodigo;



    /**
     * Set assDescricao
     *
     * @param string $assDescricao
     *
     * @return TbAssentamento
     */
    public function setAssDescricao($assDescricao)
    {
        $this->assDescricao = $assDescricao;

        return $this;
    }

    /**
     * Get assDescricao
     *
     * @return string
     */
    public function getAssDescricao()
    {
        return $this->assDescricao;
    }

    /**
     * Set assDataCadastro
     *
     * @param \DateTime $assDataCadastro
     *
     * @return TbAssentamento
     */
    public function setAssDataCadastro($assDataCadastro)
    {
        $this->assDataCadastro = $assDataCadastro;

        return $this;
    }

    /**
     * Get assDataCadastro
     *
     * @return \DateTime
     */
    public function getAssDataCadastro()
    {
        return $this->assDataCadastro;
    }

    /**
     * Get assCodigo
     *
     * @return integer
     */
    public function getAssCodigo()
    {
        return $this->assCodigo;
    }

    /**
     * Set usuCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo
     *
     * @return TbAssentamento
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
     * Set solCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbSolicitacao $solCodigo
     *
     * @return TbAssentamento
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
