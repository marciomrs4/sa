<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbTipoDirecionamento
 *
 * @ORM\Table(name="tb_tipo_direcionamento")
 * @ORM\Entity
 */
class TbTipoDirecionamento
{
    /**
     * @var string
     *
     * @ORM\Column(name="td_descricao", type="string", length=255, nullable=false)
     */
    private $tdDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="td_ativo", type="string", length=1, nullable=false)
     */
    private $tdAtivo = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="td_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tdCodigo;



    /**
     * Set tdDescricao
     *
     * @param string $tdDescricao
     *
     * @return TbTipoDirecionamento
     */
    public function setTdDescricao($tdDescricao)
    {
        $this->tdDescricao = $tdDescricao;

        return $this;
    }

    /**
     * Get tdDescricao
     *
     * @return string
     */
    public function getTdDescricao()
    {
        return $this->tdDescricao;
    }

    /**
     * Set tdAtivo
     *
     * @param string $tdAtivo
     *
     * @return TbTipoDirecionamento
     */
    public function setTdAtivo($tdAtivo)
    {
        $this->tdAtivo = $tdAtivo;

        return $this;
    }

    /**
     * Get tdAtivo
     *
     * @return string
     */
    public function getTdAtivo()
    {
        return $this->tdAtivo;
    }

    /**
     * Get tdCodigo
     *
     * @return integer
     */
    public function getTdCodigo()
    {
        return $this->tdCodigo;
    }

    public function __toString()
    {
        return $this->getTdDescricao();
    }

    public function getId()
    {
        return $this->getTdCodigo();
    }
}
