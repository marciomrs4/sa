<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbTipoAcesso
 *
 * @ORM\Table(name="tb_tipo_acesso")
 * @ORM\Entity
 */
class TbTipoAcesso
{
    /**
     * @var string
     *
     * @ORM\Column(name="tac_descricao", type="string", length=45, nullable=false)
     */
    private $tacDescricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="tac_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tacCodigo;



    /**
     * Set tacDescricao
     *
     * @param string $tacDescricao
     *
     * @return TbTipoAcesso
     */
    public function setTacDescricao($tacDescricao)
    {
        $this->tacDescricao = $tacDescricao;

        return $this;
    }

    /**
     * Get tacDescricao
     *
     * @return string
     */
    public function getTacDescricao()
    {
        return $this->tacDescricao;
    }

    /**
     * Get tacCodigo
     *
     * @return integer
     */
    public function getTacCodigo()
    {
        return $this->tacCodigo;
    }

    public function __toString()
    {
        return $this->getTacDescricao();
    }
}
