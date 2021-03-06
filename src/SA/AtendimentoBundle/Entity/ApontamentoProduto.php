<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ApontamentoProduto
 *
 * @ORM\Table(name="apontamento_produto", indexes={@ORM\Index(name="fk_apontamento_produto_idx", columns={"produto_id"}), @ORM\Index(name="fk_apontamento_status_idx", columns={"status_id"}), @ORM\Index(name="fk_apontamento_ligacao_idx", columns={"tipo_ligacao"})})
 * @ORM\Entity(repositoryClass="SA\AtendimentoBundle\Repository\ApontamentoProdutoRepository")
 */
class ApontamentoProduto
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="datetime", nullable=false)
     */
    private $dataCriacao;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbUsuario
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="usu_codigo")
     * })
     */
    private $usuarioId;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="O Campo descrição é obrigatório")
     */
    private $descricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \SA\AtendimentoBundle\Entity\StatusProduto
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\StatusProduto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;

    /**
     * @var \SA\AtendimentoBundle\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produto_id", referencedColumnName="id")
     * })
     */
    private $produto;

    /**
     * @var \SA\AtendimentoBundle\Entity\TipoLigacao
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TipoLigacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_ligacao", referencedColumnName="id")
     * })
     * @Assert\NotBlank(message="O Campo Tipo de Ligação é obrigatório")
     */
    private $tipoLigacao;


    public function __construct()
    {
        $this->dataCriacao = new \DateTime('now');
    }


    /**
     * Set dataCriacao
     *
     * @param \DateTime $dataCriacao
     *
     * @return ApontamentoProduto
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * Get dataCriacao
     *
     * @return \DateTime
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }
    

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return ApontamentoProduto
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set status
     *
     * @param \SA\AtendimentoBundle\Entity\StatusProduto $status
     *
     * @return ApontamentoProduto
     */
    public function setStatus(\SA\AtendimentoBundle\Entity\StatusProduto $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \SA\AtendimentoBundle\Entity\StatusProduto
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set produto
     *
     * @param \SA\AtendimentoBundle\Entity\Produto $produto
     *
     * @return ApontamentoProduto
     */
    public function setProduto(\SA\AtendimentoBundle\Entity\Produto $produto = null)
    {
        $this->produto = $produto;

        return $this;
    }

    /**
     * Get produto
     *
     * @return \SA\AtendimentoBundle\Entity\Produto
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * Set tipoLigacao
     *
     * @param \SA\AtendimentoBundle\Entity\TipoLigacao $tipoLigacao
     *
     * @return ApontamentoProduto
     */
    public function setTipoLigacao(\SA\AtendimentoBundle\Entity\TipoLigacao $tipoLigacao = null)
    {
        $this->tipoLigacao = $tipoLigacao;

        return $this;
    }

    /**
     * Get tipoLigacao
     *
     * @return \SA\AtendimentoBundle\Entity\TipoLigacao
     */
    public function getTipoLigacao()
    {
        return $this->tipoLigacao;
    }

    /**
     * Set usuarioId
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuarioId
     *
     * @return ApontamentoProduto
     */
    public function setUsuarioId(\SA\AtendimentoBundle\Entity\TbUsuario $usuarioId = null)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return \SA\AtendimentoBundle\Entity\TbUsuario
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }
}
