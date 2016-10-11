<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbLog
 *
 * @ORM\Table(name="tb_log")
 * @ORM\Entity
 */
class TbLog
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="log_data_time", type="datetime", nullable=false)
     */
    private $logDataTime = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="log_tipo_acao", type="string", length=255, nullable=false)
     */
    private $logTipoAcao;

    /**
     * @var integer
     *
     * @ORM\Column(name="log_codigo_usuario", type="integer", nullable=false)
     */
    private $logCodigoUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="log_codigo_aterado", type="integer", nullable=false)
     */
    private $logCodigoAterado;

    /**
     * @var string
     *
     * @ORM\Column(name="log_descricao_alteracao_acao", type="string", length=255, nullable=false)
     */
    private $logDescricaoAlteracaoAcao;

    /**
     * @var integer
     *
     * @ORM\Column(name="log_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $logCodigo;



    /**
     * Set logDataTime
     *
     * @param \DateTime $logDataTime
     *
     * @return TbLog
     */
    public function setLogDataTime($logDataTime)
    {
        $this->logDataTime = $logDataTime;

        return $this;
    }

    /**
     * Get logDataTime
     *
     * @return \DateTime
     */
    public function getLogDataTime()
    {
        return $this->logDataTime;
    }

    /**
     * Set logTipoAcao
     *
     * @param string $logTipoAcao
     *
     * @return TbLog
     */
    public function setLogTipoAcao($logTipoAcao)
    {
        $this->logTipoAcao = $logTipoAcao;

        return $this;
    }

    /**
     * Get logTipoAcao
     *
     * @return string
     */
    public function getLogTipoAcao()
    {
        return $this->logTipoAcao;
    }

    /**
     * Set logCodigoUsuario
     *
     * @param integer $logCodigoUsuario
     *
     * @return TbLog
     */
    public function setLogCodigoUsuario($logCodigoUsuario)
    {
        $this->logCodigoUsuario = $logCodigoUsuario;

        return $this;
    }

    /**
     * Get logCodigoUsuario
     *
     * @return integer
     */
    public function getLogCodigoUsuario()
    {
        return $this->logCodigoUsuario;
    }

    /**
     * Set logCodigoAterado
     *
     * @param integer $logCodigoAterado
     *
     * @return TbLog
     */
    public function setLogCodigoAterado($logCodigoAterado)
    {
        $this->logCodigoAterado = $logCodigoAterado;

        return $this;
    }

    /**
     * Get logCodigoAterado
     *
     * @return integer
     */
    public function getLogCodigoAterado()
    {
        return $this->logCodigoAterado;
    }

    /**
     * Set logDescricaoAlteracaoAcao
     *
     * @param string $logDescricaoAlteracaoAcao
     *
     * @return TbLog
     */
    public function setLogDescricaoAlteracaoAcao($logDescricaoAlteracaoAcao)
    {
        $this->logDescricaoAlteracaoAcao = $logDescricaoAlteracaoAcao;

        return $this;
    }

    /**
     * Get logDescricaoAlteracaoAcao
     *
     * @return string
     */
    public function getLogDescricaoAlteracaoAcao()
    {
        return $this->logDescricaoAlteracaoAcao;
    }

    /**
     * Get logCodigo
     *
     * @return integer
     */
    public function getLogCodigo()
    {
        return $this->logCodigo;
    }
}
