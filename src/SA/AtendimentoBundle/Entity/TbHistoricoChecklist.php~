<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbHistoricoChecklist
 *
 * @ORM\Table(name="tb_historico_checklist")
 * @ORM\Entity
 */
class TbHistoricoChecklist
{
    /**
     * @var integer
     *
     * @ORM\Column(name="che_codigo", type="integer", nullable=false)
     */
    private $cheCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="che_titulo", type="string", length=255, nullable=false)
     */
    private $cheTitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_email", type="string", length=255, nullable=false)
     */
    private $usuEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hck_data", type="datetime", nullable=false)
     */
    private $hckData = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="hck_status", type="string", length=1, nullable=false)
     */
    private $hckStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="hck_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hckCodigo;



    /**
     * Set cheCodigo
     *
     * @param integer $cheCodigo
     *
     * @return TbHistoricoChecklist
     */
    public function setCheCodigo($cheCodigo)
    {
        $this->cheCodigo = $cheCodigo;

        return $this;
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
     * Set cheTitulo
     *
     * @param string $cheTitulo
     *
     * @return TbHistoricoChecklist
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
     * Set usuEmail
     *
     * @param string $usuEmail
     *
     * @return TbHistoricoChecklist
     */
    public function setUsuEmail($usuEmail)
    {
        $this->usuEmail = $usuEmail;

        return $this;
    }

    /**
     * Get usuEmail
     *
     * @return string
     */
    public function getUsuEmail()
    {
        return $this->usuEmail;
    }

    /**
     * Set hckData
     *
     * @param \DateTime $hckData
     *
     * @return TbHistoricoChecklist
     */
    public function setHckData($hckData)
    {
        $this->hckData = $hckData;

        return $this;
    }

    /**
     * Get hckData
     *
     * @return \DateTime
     */
    public function getHckData()
    {
        return $this->hckData;
    }

    /**
     * Set hckStatus
     *
     * @param string $hckStatus
     *
     * @return TbHistoricoChecklist
     */
    public function setHckStatus($hckStatus)
    {
        $this->hckStatus = $hckStatus;

        return $this;
    }

    /**
     * Get hckStatus
     *
     * @return string
     */
    public function getHckStatus()
    {
        return $this->hckStatus;
    }

    /**
     * Get hckCodigo
     *
     * @return integer
     */
    public function getHckCodigo()
    {
        return $this->hckCodigo;
    }
}
