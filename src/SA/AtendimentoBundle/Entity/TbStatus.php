<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbStatus
 *
 * @ORM\Table(name="tb_status")
 * @ORM\Entity
 */
class TbStatus
{
    /**
     * @var string
     *
     * @ORM\Column(name="sta_descricao", type="string", length=45, nullable=false)
     */
    private $staDescricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="sta_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $staCodigo;



    /**
     * Set staDescricao
     *
     * @param string $staDescricao
     *
     * @return TbStatus
     */
    public function setStaDescricao($staDescricao)
    {
        $this->staDescricao = $staDescricao;

        return $this;
    }

    /**
     * Get staDescricao
     *
     * @return string
     */
    public function getStaDescricao()
    {
        return $this->staDescricao;
    }

    /**
     * Get staCodigo
     *
     * @return integer
     */
    public function getStaCodigo()
    {
        return $this->staCodigo;
    }
}
