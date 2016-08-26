<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbTipoAtendimento
 *
 * @ORM\Table(name="tb_tipo_atendimento")
 * @ORM\Entity(repositoryClass="SA\AtendimentoBundle\Repository\TipoAtendimentoRepository")
 */
class TbTipoAtendimento
{
    /**
     * @var string
     *
     * @ORM\Column(name="at_descricao", type="string", length=255, nullable=false)
     */
    private $atDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="at_ativo", type="string", length=1, nullable=false)
     */
    private $atAtivo = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="at_texto_padrao", type="text", length=65535, nullable=true)
     */
    private $atTextoPadrao;

    /**
     * @var integer
     *
     * @ORM\Column(name="at_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $atCodigo;



    /**
     * Set atDescricao
     *
     * @param string $atDescricao
     *
     * @return TbTipoAtendimento
     */
    public function setAtDescricao($atDescricao)
    {
        $this->atDescricao = $atDescricao;

        return $this;
    }

    /**
     * Get atDescricao
     *
     * @return string
     */
    public function getAtDescricao()
    {
        return $this->atDescricao;
    }

    /**
     * Set atAtivo
     *
     * @param string $atAtivo
     *
     * @return TbTipoAtendimento
     */
    public function setAtAtivo($atAtivo)
    {
        $this->atAtivo = $atAtivo;

        return $this;
    }

    /**
     * Get atAtivo
     *
     * @return string
     */
    public function getAtAtivo()
    {
        return $this->atAtivo;
    }

    /**
     * Set atTextoPadrao
     *
     * @param string $atTextoPadrao
     *
     * @return TbTipoAtendimento
     */
    public function setAtTextoPadrao($atTextoPadrao)
    {
        $this->atTextoPadrao = $atTextoPadrao;

        return $this;
    }

    /**
     * Get atTextoPadrao
     *
     * @return string
     */
    public function getAtTextoPadrao()
    {
        return $this->atTextoPadrao;
    }

    /**
     * Get atCodigo
     *
     * @return integer
     */
    public function getAtCodigo()
    {
        return $this->atCodigo;
    }

    public function __toString()
    {
        return $this->getAtDescricao();
    }

    public function getId()
    {
        return $this->getAtCodigo();
    }
}
