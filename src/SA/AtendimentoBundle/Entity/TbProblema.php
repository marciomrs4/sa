<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbProblema
 *
 * @ORM\Table(name="tb_problema", indexes={@ORM\Index(name="fk_tb_problema_tb_departamento1", columns={"dep_codigo"}), @ORM\Index(name="fk_prioridade", columns={"pri_codigo"})})
 * @ORM\Entity
 */
class TbProblema
{
    /**
     * @var string
     *
     * @ORM\Column(name="pro_descricao", type="string", length=45, nullable=false)
     */
    private $proDescricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="pro_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @var \SA\AtendimentoBundle\Entity\TbPrioridade
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbPrioridade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pri_codigo", referencedColumnName="pri_codigo")
     * })
     */
    private $priCodigo;



    /**
     * Set proDescricao
     *
     * @param string $proDescricao
     *
     * @return TbProblema
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
     * Get proCodigo
     *
     * @return integer
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
     * @return TbProblema
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

    /**
     * Set priCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbPrioridade $priCodigo
     *
     * @return TbProblema
     */
    public function setPriCodigo(\SA\AtendimentoBundle\Entity\TbPrioridade $priCodigo = null)
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
