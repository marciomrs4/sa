<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbEnvioPara
 *
 * @ORM\Table(name="tb_envio_para", indexes={@ORM\Index(name="fk_tabela_problema", columns={"pro_codigo"}), @ORM\Index(name="fk_tabela_usuario", columns={"usu_codigo"}), @ORM\Index(name="fk_tabela_departamento", columns={"dep_codigo"})})
 * @ORM\Entity
 */
class TbEnvioPara
{
    /**
     * @var integer
     *
     * @ORM\Column(name="enp_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $enpCodigo;

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
     * @var \SA\AtendimentoBundle\Entity\TbProblema
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbProblema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_codigo", referencedColumnName="pro_codigo")
     * })
     */
    private $proCodigo;

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
     * Get enpCodigo
     *
     * @return integer
     */
    public function getEnpCodigo()
    {
        return $this->enpCodigo;
    }

    /**
     * Set usuCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo
     *
     * @return TbEnvioPara
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
     * Set proCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbProblema $proCodigo
     *
     * @return TbEnvioPara
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

    /**
     * Set depCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbDepartamento $depCodigo
     *
     * @return TbEnvioPara
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
