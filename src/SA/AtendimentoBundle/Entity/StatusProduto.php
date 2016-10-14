<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusProduto
 *
 * @ORM\Table(name="status_produto")
 * @ORM\Entity
 */
class StatusProduto
{
    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=45, nullable=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return StatusProduto
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return StatusProduto
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->getDescricao();
    }
}
