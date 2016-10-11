<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbAnexo
 *
 * @ORM\Table(name="tb_anexo", indexes={@ORM\Index(name="fk_solicitacao", columns={"sol_codigo"})})
 * @ORM\Entity
 */
class TbAnexo
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
     * @var \SA\AtendimentoBundle\Entity\TbSolicitacao
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbSolicitacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sol_codigo", referencedColumnName="sol_codigo")
     * })
     */
    private $solCodigo;



    /**
     * Set aneAnexo
     *
     * @param string $aneAnexo
     *
     * @return TbAnexo
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
     * @return TbAnexo
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
     * @return TbAnexo
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
     * @return TbAnexo
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
     * Set solCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbSolicitacao $solCodigo
     *
     * @return TbAnexo
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
