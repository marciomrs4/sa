<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbProjeto
 *
 * @ORM\Table(name="tb_projeto", indexes={@ORM\Index(name="fk_status_projeto", columns={"stp_codigo"}), @ORM\Index(name="fk_dep_codigo", columns={"dep_codigo"}), @ORM\Index(name="fk_usu_codigo", columns={"usu_codigo"})})
 * @ORM\Entity
 */
class TbProjeto
{
    /**
     * @var string
     *
     * @ORM\Column(name="pro_cod_projeto", type="string", length=100, nullable=false)
     */
    private $proCodProjeto;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_titulo", type="string", length=255, nullable=false)
     */
    private $proTitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_descricao", type="text", length=65535, nullable=false)
     */
    private $proDescricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_data_cadastro", type="datetime", nullable=false)
     */
    private $proDataCadastro = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_previsao_inicio", type="date", nullable=false)
     */
    private $proPrevisaoInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_previsao_fim", type="date", nullable=false)
     */
    private $proPrevisaoFim;

    /**
     * @var integer
     *
     * @ORM\Column(name="pro_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $proCodigo;

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
     * @var \SA\AtendimentoBundle\Entity\TbStatusProjeto
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbStatusProjeto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stp_codigo", referencedColumnName="stp_codigo")
     * })
     */
    private $stpCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbDepartamento
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbDepartamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_codigo", referencedColumnName="dep_codigo")
     * })
     */
    private $depCodigo;



    /**
     * Set proCodProjeto
     *
     * @param string $proCodProjeto
     *
     * @return TbProjeto
     */
    public function setProCodProjeto($proCodProjeto)
    {
        $this->proCodProjeto = $proCodProjeto;

        return $this;
    }

    /**
     * Get proCodProjeto
     *
     * @return string
     */
    public function getProCodProjeto()
    {
        return $this->proCodProjeto;
    }

    /**
     * Set proTitulo
     *
     * @param string $proTitulo
     *
     * @return TbProjeto
     */
    public function setProTitulo($proTitulo)
    {
        $this->proTitulo = $proTitulo;

        return $this;
    }

    /**
     * Get proTitulo
     *
     * @return string
     */
    public function getProTitulo()
    {
        return $this->proTitulo;
    }

    /**
     * Set proDescricao
     *
     * @param string $proDescricao
     *
     * @return TbProjeto
     */
    public function setProDescricao($proDescricao)
    {
        $this->proDescricao = $proDescricao;

        return $this;
    }

    /**
     * Get proDescricao
     *
     * @return string
     */
    public function getProDescricao()
    {
        return $this->proDescricao;
    }

    /**
     * Set proDataCadastro
     *
     * @param \DateTime $proDataCadastro
     *
     * @return TbProjeto
     */
    public function setProDataCadastro($proDataCadastro)
    {
        $this->proDataCadastro = $proDataCadastro;

        return $this;
    }

    /**
     * Get proDataCadastro
     *
     * @return \DateTime
     */
    public function getProDataCadastro()
    {
        return $this->proDataCadastro;
    }

    /**
     * Set proPrevisaoInicio
     *
     * @param \DateTime $proPrevisaoInicio
     *
     * @return TbProjeto
     */
    public function setProPrevisaoInicio($proPrevisaoInicio)
    {
        $this->proPrevisaoInicio = $proPrevisaoInicio;

        return $this;
    }

    /**
     * Get proPrevisaoInicio
     *
     * @return \DateTime
     */
    public function getProPrevisaoInicio()
    {
        return $this->proPrevisaoInicio;
    }

    /**
     * Set proPrevisaoFim
     *
     * @param \DateTime $proPrevisaoFim
     *
     * @return TbProjeto
     */
    public function setProPrevisaoFim($proPrevisaoFim)
    {
        $this->proPrevisaoFim = $proPrevisaoFim;

        return $this;
    }

    /**
     * Get proPrevisaoFim
     *
     * @return \DateTime
     */
    public function getProPrevisaoFim()
    {
        return $this->proPrevisaoFim;
    }

    /**
     * Get proCodigo
     *
     * @return integer
     */
    public function getProCodigo()
    {
        return $this->proCodigo;
    }

    /**
     * Set usuCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo
     *
     * @return TbProjeto
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
     * Set stpCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbStatusProjeto $stpCodigo
     *
     * @return TbProjeto
     */
    public function setStpCodigo(\SA\AtendimentoBundle\Entity\TbStatusProjeto $stpCodigo = null)
    {
        $this->stpCodigo = $stpCodigo;

        return $this;
    }

    /**
     * Get stpCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbStatusProjeto
     */
    public function getStpCodigo()
    {
        return $this->stpCodigo;
    }

    /**
     * Set depCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbDepartamento $depCodigo
     *
     * @return TbProjeto
     */
    public function setDepCodigo(\SA\AtendimentoBundle\Entity\TbDepartamento $depCodigo = null)
    {
        $this->depCodigo = $depCodigo;

        return $this;
    }

    /**
     * Get depCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbDepartamento
     */
    public function getDepCodigo()
    {
        return $this->depCodigo;
    }
}
