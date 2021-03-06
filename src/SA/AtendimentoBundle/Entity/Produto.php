<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Produto
 *
 * @ORM\Table(name="produto", indexes={@ORM\Index(name="fk_atendimento_produto_idx", columns={"atendimento_id"}), @ORM\Index(name="fk_status_produto_idx", columns={"status_id"})})
 * @ORM\Entity(repositoryClass="SA\AtendimentoBundle\Repository\ProdutoRepository")
 */
class Produto
{
    /**
     * @var string
     *
     * @ORM\Column(name="codigo_tp", type="string", length=45, nullable=false)
     * @Assert\NotBlank(message="Código TP é Obrigátório")
     */
    private $codigoTp;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_scodes", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Código SCODES é Obrigátório")
     */
    private $codigoScodes;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=800, nullable=false)
     * @Assert\NotBlank(message="O campo de Descrição")
     */
    private $descricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade", type="integer", nullable=false)
     * @Assert\NotBlank(message="O campo quantidade é obrigatório")
     */
    private $quantidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="datetime", nullable=false)
     */
    private $dataCriacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_retorno", type="date", nullable=true)
     */
    private $dataRetorno;

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbAtendimento
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbAtendimento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="atendimento_id", referencedColumnName="at_codigo")
     * })
     */
    private $atendimento;

    /**
     * @var \SA\AtendimentoBundle\Entity\StatusProduto
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\StatusProduto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;


    public function __construct()
    {
        $data = new \DateTime('now');
        $this->dataCriacao = $data;
        $this->dataRetorno = $data;
    }


    /**
     * Set codigoTp
     *
     * @param string $codigoTp
     *
     * @return Produto
     */
    public function setCodigoTp($codigoTp)
    {
        $this->codigoTp = $codigoTp;

        return $this;
    }

    /**
     * Get codigoTp
     *
     * @return string
     */
    public function getCodigoTp()
    {
        return $this->codigoTp;
    }

    /**
     * Set codigoScodes
     *
     * @param string $codigoScodes
     *
     * @return Produto
     */
    public function setCodigoScodes($codigoScodes)
    {
        $this->codigoScodes = $codigoScodes;

        return $this;
    }

    /**
     * Get codigoScodes
     *
     * @return string
     */
    public function getCodigoScodes()
    {
        return $this->codigoScodes;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Produto
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
     * Set quantidade
     *
     * @param integer $quantidade
     *
     * @return Produto
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return integer
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set dataCriacao
     *
     * @param \DateTime $dataCriacao
     *
     * @return Produto
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set atendimento
     *
     * @param \SA\AtendimentoBundle\Entity\TbAtendimento $atendimento
     *
     * @return Produto
     */
    public function setAtendimento(\SA\AtendimentoBundle\Entity\TbAtendimento $atendimento = null)
    {
        $this->atendimento = $atendimento;

        return $this;
    }

    /**
     * Get atendimento
     *
     * @return \SA\AtendimentoBundle\Entity\TbAtendimento
     */
    public function getAtendimento()
    {
        return $this->atendimento;
    }

    /**
     * Set status
     *
     * @param \SA\AtendimentoBundle\Entity\StatusProduto $status
     *
     * @return Produto
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
     * Set usuarioId
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuarioId
     *
     * @return Produto
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

    /**
     * Set dataRetorno
     *
     * @param \DateTime $dataRetorno
     *
     * @return Produto
     */
    public function setDataRetorno($dataRetorno)
    {
        $this->dataRetorno = $dataRetorno;

        return $this;
    }

    /**
     * Get dataRetorno
     *
     * @return \DateTime
     */
    public function getDataRetorno()
    {
        return $this->dataRetorno;
    }
}
