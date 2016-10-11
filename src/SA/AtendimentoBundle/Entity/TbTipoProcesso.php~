<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbTipoProcesso
 *
 * @ORM\Table(name="tb_tipo_processo")
 * @ORM\Entity
 */
class TbTipoProcesso
{
    /**
     * @var string
     *
     * @ORM\Column(name="ttp_descricao", type="string", length=45, nullable=false)
     */
    private $ttpDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="ttp_status", type="string", length=1, nullable=false)
     */
    private $ttpStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="ttp_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ttpCodigo;



    /**
     * Set ttpDescricao
     *
     * @param string $ttpDescricao
     *
     * @return TbTipoProcesso
     */
    public function setTtpDescricao($ttpDescricao)
    {
        $this->ttpDescricao = $ttpDescricao;

        return $this;
    }

    /**
     * Get ttpDescricao
     *
     * @return string
     */
    public function getTtpDescricao()
    {
        return $this->ttpDescricao;
    }

    /**
     * Set ttpStatus
     *
     * @param string $ttpStatus
     *
     * @return TbTipoProcesso
     */
    public function setTtpStatus($ttpStatus)
    {
        $this->ttpStatus = $ttpStatus;

        return $this;
    }

    /**
     * Get ttpStatus
     *
     * @return string
     */
    public function getTtpStatus()
    {
        return $this->ttpStatus;
    }

    /**
     * Get ttpCodigo
     *
     * @return integer
     */
    public function getTtpCodigo()
    {
        return $this->ttpCodigo;
    }

    public function __toString()
    {
        return $this->getTtpDescricao();
    }

    public function getId()
    {
     return $this->getTtpCodigo();
    }
}
