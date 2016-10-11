<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbStatusAtendimento
 *
 * @ORM\Table(name="tb_status_atendimento")
 * @ORM\Entity
 */
class TbStatusAtendimento
{
    /**
     * @var string
     *
     * @ORM\Column(name="sat_descricao", type="string", length=255, nullable=false)
     */
    private $satDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="sat_ativo", type="string", length=1, nullable=false)
     */
    private $satAtivo = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="sat_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $satCodigo;



    /**
     * Set satDescricao
     *
     * @param string $satDescricao
     *
     * @return TbStatusAtendimento
     */
    public function setSatDescricao($satDescricao)
    {
        $this->satDescricao = $satDescricao;

        return $this;
    }

    /**
     * Get satDescricao
     *
     * @return string
     */
    public function getSatDescricao()
    {
        return $this->satDescricao;
    }

    /**
     * Set satAtivo
     *
     * @param string $satAtivo
     *
     * @return TbStatusAtendimento
     */
    public function setSatAtivo($satAtivo)
    {
        $this->satAtivo = $satAtivo;

        return $this;
    }

    /**
     * Get satAtivo
     *
     * @return string
     */
    public function getSatAtivo()
    {
        return $this->satAtivo;
    }

    /**
     * Get satCodigo
     *
     * @return integer
     */
    public function getSatCodigo()
    {
        return $this->satCodigo;
    }

    public function __toString()
    {
        return $this->getSatDescricao();
    }

}
