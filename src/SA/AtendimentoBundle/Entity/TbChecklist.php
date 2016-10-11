<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbChecklist
 *
 * @ORM\Table(name="tb_checklist", indexes={@ORM\Index(name="fk_tb_checklist_tb_departamento1", columns={"dep_codigo"}), @ORM\Index(name="fk_tb_checklist_tb_usuario1", columns={"usu_codigo"})})
 * @ORM\Entity
 */
class TbChecklist
{
    /**
     * @var string
     *
     * @ORM\Column(name="che_titulo", type="string", length=255, nullable=false)
     */
    private $cheTitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="che_descricao", type="text", length=65535, nullable=true)
     */
    private $cheDescricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="che_data_cadastro", type="datetime", nullable=false)
     */
    private $cheDataCadastro = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="che_email_envio", type="string", length=255, nullable=false)
     */
    private $cheEmailEnvio;

    /**
     * @var string
     *
     * @ORM\Column(name="che_ativo", type="string", length=1, nullable=true)
     */
    private $cheAtivo = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="che_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cheCodigo;

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
     * @var \SA\AtendimentoBundle\Entity\TbDepartamento
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbDepartamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_codigo", referencedColumnName="dep_codigo")
     * })
     */
    private $depCodigo;



    /**
     * Set cheTitulo
     *
     * @param string $cheTitulo
     *
     * @return TbChecklist
     */
    public function setCheTitulo($cheTitulo)
    {
        $this->cheTitulo = $cheTitulo;

        return $this;
    }

    /**
     * Get cheTitulo
     *
     * @return string
     */
    public function getCheTitulo()
    {
        return $this->cheTitulo;
    }

    /**
     * Set cheDescricao
     *
     * @param string $cheDescricao
     *
     * @return TbChecklist
     */
    public function setCheDescricao($cheDescricao)
    {
        $this->cheDescricao = $cheDescricao;

        return $this;
    }

    /**
     * Get cheDescricao
     *
     * @return string
     */
    public function getCheDescricao()
    {
        return $this->cheDescricao;
    }

    /**
     * Set cheDataCadastro
     *
     * @param \DateTime $cheDataCadastro
     *
     * @return TbChecklist
     */
    public function setCheDataCadastro($cheDataCadastro)
    {
        $this->cheDataCadastro = $cheDataCadastro;

        return $this;
    }

    /**
     * Get cheDataCadastro
     *
     * @return \DateTime
     */
    public function getCheDataCadastro()
    {
        return $this->cheDataCadastro;
    }

    /**
     * Set cheEmailEnvio
     *
     * @param string $cheEmailEnvio
     *
     * @return TbChecklist
     */
    public function setCheEmailEnvio($cheEmailEnvio)
    {
        $this->cheEmailEnvio = $cheEmailEnvio;

        return $this;
    }

    /**
     * Get cheEmailEnvio
     *
     * @return string
     */
    public function getCheEmailEnvio()
    {
        return $this->cheEmailEnvio;
    }

    /**
     * Set cheAtivo
     *
     * @param string $cheAtivo
     *
     * @return TbChecklist
     */
    public function setCheAtivo($cheAtivo)
    {
        $this->cheAtivo = $cheAtivo;

        return $this;
    }

    /**
     * Get cheAtivo
     *
     * @return string
     */
    public function getCheAtivo()
    {
        return $this->cheAtivo;
    }

    /**
     * Get cheCodigo
     *
     * @return integer
     */
    public function getCheCodigo()
    {
        return $this->cheCodigo;
    }

    /**
     * Set usuCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo
     *
     * @return TbChecklist
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
     * Set depCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbDepartamento $depCodigo
     *
     * @return TbChecklist
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
