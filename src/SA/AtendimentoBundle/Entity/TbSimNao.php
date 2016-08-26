<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbSimNao
 *
 * @ORM\Table(name="tb_sim_nao")
 * @ORM\Entity
 */
class TbSimNao
{
    /**
     * @var string
     *
     * @ORM\Column(name="sn_descricao", type="string", length=45, nullable=true)
     */
    private $snDescricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="sn_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $snCodigo;



    /**
     * Set snDescricao
     *
     * @param string $snDescricao
     *
     * @return TbSimNao
     */
    public function setSnDescricao($snDescricao)
    {
        $this->snDescricao = $snDescricao;

        return $this;
    }

    /**
     * Get snDescricao
     *
     * @return string
     */
    public function getSnDescricao()
    {
        return $this->snDescricao;
    }

    /**
     * Get snCodigo
     *
     * @return integer
     */
    public function getSnCodigo()
    {
        return $this->snCodigo;
    }
}
