<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbItemChecklist
 *
 * @ORM\Table(name="tb_item_checklist", indexes={@ORM\Index(name="fk_tb_item_checklist_tb_checklist1", columns={"che_codigo"})})
 * @ORM\Entity
 */
class TbItemChecklist
{
    /**
     * @var string
     *
     * @ORM\Column(name="ich_titulo_tarefa", type="string", length=255, nullable=false)
     */
    private $ichTituloTarefa;

    /**
     * @var string
     *
     * @ORM\Column(name="ich_ativo", type="string", length=1, nullable=false)
     */
    private $ichAtivo;

    /**
     * @var string
     *
     * @ORM\Column(name="ich_link", type="string", length=45, nullable=true)
     */
    private $ichLink;

    /**
     * @var integer
     *
     * @ORM\Column(name="ich_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ichCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbChecklist
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbChecklist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="che_codigo", referencedColumnName="che_codigo")
     * })
     */
    private $cheCodigo;



    /**
     * Set ichTituloTarefa
     *
     * @param string $ichTituloTarefa
     *
     * @return TbItemChecklist
     */
    public function setIchTituloTarefa($ichTituloTarefa)
    {
        $this->ichTituloTarefa = $ichTituloTarefa;

        return $this;
    }

    /**
     * Get ichTituloTarefa
     *
     * @return string
     */
    public function getIchTituloTarefa()
    {
        return $this->ichTituloTarefa;
    }

    /**
     * Set ichAtivo
     *
     * @param string $ichAtivo
     *
     * @return TbItemChecklist
     */
    public function setIchAtivo($ichAtivo)
    {
        $this->ichAtivo = $ichAtivo;

        return $this;
    }

    /**
     * Get ichAtivo
     *
     * @return string
     */
    public function getIchAtivo()
    {
        return $this->ichAtivo;
    }

    /**
     * Set ichLink
     *
     * @param string $ichLink
     *
     * @return TbItemChecklist
     */
    public function setIchLink($ichLink)
    {
        $this->ichLink = $ichLink;

        return $this;
    }

    /**
     * Get ichLink
     *
     * @return string
     */
    public function getIchLink()
    {
        return $this->ichLink;
    }

    /**
     * Get ichCodigo
     *
     * @return integer
     */
    public function getIchCodigo()
    {
        return $this->ichCodigo;
    }

    /**
     * Set cheCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbChecklist $cheCodigo
     *
     * @return TbItemChecklist
     */
    public function setCheCodigo(\SA\AtendimentoBundle\Entity\TbChecklist $cheCodigo = null)
    {
        $this->cheCodigo = $cheCodigo;

        return $this;
    }

    /**
     * Get cheCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbChecklist
     */
    public function getCheCodigo()
    {
        return $this->cheCodigo;
    }
}
