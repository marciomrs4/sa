<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbStatusProjeto
 *
 * @ORM\Table(name="tb_status_projeto")
 * @ORM\Entity
 */
class TbStatusProjeto
{
    /**
     * @var string
     *
     * @ORM\Column(name="stp_descricao", type="string", length=255, nullable=false)
     */
    private $stpDescricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="stp_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stpCodigo;



    /**
     * Set stpDescricao
     *
     * @param string $stpDescricao
     *
     * @return TbStatusProjeto
     */
    public function setStpDescricao($stpDescricao)
    {
        $this->stpDescricao = $stpDescricao;

        return $this;
    }

    /**
     * Get stpDescricao
     *
     * @return string
     */
    public function getStpDescricao()
    {
        return $this->stpDescricao;
    }

    /**
     * Get stpCodigo
     *
     * @return integer
     */
    public function getStpCodigo()
    {
        return $this->stpCodigo;
    }
}
