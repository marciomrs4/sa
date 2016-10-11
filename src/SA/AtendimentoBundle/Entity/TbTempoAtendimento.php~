<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbTempoAtendimento
 *
 * @ORM\Table(name="tb_tempo_atendimento", indexes={@ORM\Index(name="fk_tb_tempo_atendimento_tb_departamento1", columns={"dep_codigo"})})
 * @ORM\Entity
 */
class TbTempoAtendimento
{
    /**
     * @var string
     *
     * @ORM\Column(name="tat_descricao", type="string", length=45, nullable=false)
     */
    private $tatDescricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="tat_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * Set tatDescricao
     *
     * @param string $tatDescricao
     *
     * @return TbTempoAtendimento
     */
    public function setTatDescricao($tatDescricao)
    {
        $this->tatDescricao = $tatDescricao;

        return $this;
    }

    /**
     * Get tatDescricao
     *
     * @return string
     */
    public function getTatDescricao()
    {
        return $this->tatDescricao;
    }

    /**
     * Get tatCodigo
     *
     * @return integer
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
     * @return TbTempoAtendimento
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
