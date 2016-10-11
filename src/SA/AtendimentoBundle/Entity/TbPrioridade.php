<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbPrioridade
 *
 * @ORM\Table(name="tb_prioridade", indexes={@ORM\Index(name="fk_tb_prioridade_tb_tempo_atendimento1", columns={"tat_codigo"}), @ORM\Index(name="fk_tb_prioridade_tb_departamento1", columns={"dep_codigo"})})
 * @ORM\Entity
 */
class TbPrioridade
{
    /**
     * @var string
     *
     * @ORM\Column(name="pri_descricao", type="string", length=45, nullable=false)
     */
    private $priDescricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="pri_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $priCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbTempoAtendimento
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbTempoAtendimento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tat_codigo", referencedColumnName="tat_codigo")
     * })
     */
    private $tatCodigo;

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
     * Set priDescricao
     *
     * @param string $priDescricao
     *
     * @return TbPrioridade
     */
    public function setPriDescricao($priDescricao)
    {
        $this->priDescricao = $priDescricao;

        return $this;
    }

    /**
     * Get priDescricao
     *
     * @return string
     */
    public function getPriDescricao()
    {
        return $this->priDescricao;
    }

    /**
     * Get priCodigo
     *
     * @return integer
     */
    public function getPriCodigo()
    {
        return $this->priCodigo;
    }

    /**
     * Set tatCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbTempoAtendimento $tatCodigo
     *
     * @return TbPrioridade
     */
    public function setTatCodigo(\SA\AtendimentoBundle\Entity\TbTempoAtendimento $tatCodigo = null)
    {
        $this->tatCodigo = $tatCodigo;

        return $this;
    }

    /**
     * Get tatCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbTempoAtendimento
     */
    public function getTatCodigo()
    {
        return $this->tatCodigo;
    }

    /**
     * Set depCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbDepartamento $depCodigo
     *
     * @return TbPrioridade
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
