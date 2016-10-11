<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbAnexoChecklist
 *
 * @ORM\Table(name="tb_anexo_checklist", indexes={@ORM\Index(name="fk_tb_anexo_checklist_tb_item_checklist1", columns={"ich_codigo"})})
 * @ORM\Entity
 */
class TbAnexoChecklist
{
    /**
     * @var string
     *
     * @ORM\Column(name="ane_anexo", type="blob", nullable=true)
     */
    private $aneAnexo;

    /**
     * @var string
     *
     * @ORM\Column(name="ane_tipo", type="string", length=255, nullable=true)
     */
    private $aneTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="ane_nome", type="string", length=255, nullable=true)
     */
    private $aneNome;

    /**
     * @var string
     *
     * @ORM\Column(name="ane_tamanho", type="string", length=255, nullable=true)
     */
    private $aneTamanho;

    /**
     * @var integer
     *
     * @ORM\Column(name="ane_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aneCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbItemChecklist
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbItemChecklist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ich_codigo", referencedColumnName="ich_codigo")
     * })
     */
    private $ichCodigo;



    /**
     * Set aneAnexo
     *
     * @param string $aneAnexo
     *
     * @return TbAnexoChecklist
     */
    public function setAneAnexo($aneAnexo)
    {
        $this->aneAnexo = $aneAnexo;

        return $this;
    }

    /**
     * Get aneAnexo
     *
     * @return string
     */
    public function getAneAnexo()
    {
        return $this->aneAnexo;
    }

    /**
     * Set aneTipo
     *
     * @param string $aneTipo
     *
     * @return TbAnexoChecklist
     */
    public function setAneTipo($aneTipo)
    {
        $this->aneTipo = $aneTipo;

        return $this;
    }

    /**
     * Get aneTipo
     *
     * @return string
     */
    public function getAneTipo()
    {
        return $this->aneTipo;
    }

    /**
     * Set aneNome
     *
     * @param string $aneNome
     *
     * @return TbAnexoChecklist
     */
    public function setAneNome($aneNome)
    {
        $this->aneNome = $aneNome;

        return $this;
    }

    /**
     * Get aneNome
     *
     * @return string
     */
    public function getAneNome()
    {
        return $this->aneNome;
    }

    /**
     * Set aneTamanho
     *
     * @param string $aneTamanho
     *
     * @return TbAnexoChecklist
     */
    public function setAneTamanho($aneTamanho)
    {
        $this->aneTamanho = $aneTamanho;

        return $this;
    }

    /**
     * Get aneTamanho
     *
     * @return string
     */
    public function getAneTamanho()
    {
        return $this->aneTamanho;
    }

    /**
     * Get aneCodigo
     *
     * @return integer
     */
    public function getAneCodigo()
    {
        return $this->aneCodigo;
    }

    /**
     * Set ichCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbItemChecklist $ichCodigo
     *
     * @return TbAnexoChecklist
     */
    public function setIchCodigo(\SA\AtendimentoBundle\Entity\TbItemChecklist $ichCodigo = null)
    {
        $this->ichCodigo = $ichCodigo;

        return $this;
    }

    /**
     * Get ichCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbItemChecklist
     */
    public function getIchCodigo()
    {
        return $this->ichCodigo;
    }
}
