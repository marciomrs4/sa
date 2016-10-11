<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TbDepartamento
 *
 * @ORM\Table(name="tb_departamento")
 * @ORM\Entity
 */
class TbDepartamento
{
    /**
     * @var string
     *
     * @ORM\Column(name="dep_descricao", type="string", length=45, nullable=false)
     */
    private $depDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="dep_email", type="string", length=45, nullable=false)
     * @Assert\Email(message="O E-mail {{ value }} não é válido")
     */
    private $depEmail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pro_permite_listar_chamado", type="boolean", nullable=true)
     */
    private $proPermiteListarChamado;

    /**
     * @var integer
     *
     * @ORM\Column(name="dep_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $depCodigo;



    /**
     * Set depDescricao
     *
     * @param string $depDescricao
     *
     * @return TbDepartamento
     */
    public function setDepDescricao($depDescricao)
    {
        $this->depDescricao = $depDescricao;

        return $this;
    }

    /**
     * Get depDescricao
     *
     * @return string
     */
    public function getDepDescricao()
    {
        return $this->depDescricao;
    }

    /**
     * Set depEmail
     *
     * @param string $depEmail
     *
     * @return TbDepartamento
     */
    public function setDepEmail($depEmail)
    {
        $this->depEmail = $depEmail;

        return $this;
    }

    /**
     * Get depEmail
     *
     * @return string
     */
    public function getDepEmail()
    {
        return $this->depEmail;
    }

    /**
     * Set proPermiteListarChamado
     *
     * @param boolean $proPermiteListarChamado
     *
     * @return TbDepartamento
     */
    public function setProPermiteListarChamado($proPermiteListarChamado)
    {
        $this->proPermiteListarChamado = $proPermiteListarChamado;

        return $this;
    }

    /**
     * Get proPermiteListarChamado
     *
     * @return boolean
     */
    public function getProPermiteListarChamado()
    {
        return $this->proPermiteListarChamado;
    }

    /**
     * Get depCodigo
     *
     * @return integer
     */
    public function getDepCodigo()
    {
        return $this->depCodigo;
    }

    public function getId()
    {
        return $this->getDepCodigo();
    }

    public function __toString()
    {
        return $this->getDepDescricao();
    }
}
