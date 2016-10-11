<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbLayout
 *
 * @ORM\Table(name="tb_layout", indexes={@ORM\Index(name="fk_usuario_layout", columns={"usu_codigo"})})
 * @ORM\Entity
 */
class TbLayout
{
    /**
     * @var string
     *
     * @ORM\Column(name="lay_fundo_tela", type="string", length=8, nullable=false)
     */
    private $layFundoTela;

    /**
     * @var string
     *
     * @ORM\Column(name="lay_menu_principal", type="string", length=8, nullable=false)
     */
    private $layMenuPrincipal;

    /**
     * @var string
     *
     * @ORM\Column(name="lay_botoes_menu", type="string", length=8, nullable=false)
     */
    private $layBotoesMenu = '';

    /**
     * @var string
     *
     * @ORM\Column(name="lay_botoes_tela", type="string", length=8, nullable=false)
     */
    private $layBotoesTela;

    /**
     * @var string
     *
     * @ORM\Column(name="lay_tabela", type="string", length=8, nullable=false)
     */
    private $layTabela;

    /**
     * @var string
     *
     * @ORM\Column(name="lay_tabela_linha_par", type="string", length=8, nullable=false)
     */
    private $layTabelaLinhaPar;

    /**
     * @var string
     *
     * @ORM\Column(name="lay_tabela_linha_impar", type="string", length=8, nullable=false)
     */
    private $layTabelaLinhaImpar;

    /**
     * @var string
     *
     * @ORM\Column(name="lay_passar_mouse_botao", type="string", length=8, nullable=false)
     */
    private $layPassarMouseBotao;

    /**
     * @var string
     *
     * @ORM\Column(name="lay_passar_mouse_tabela", type="string", length=8, nullable=false)
     */
    private $layPassarMouseTabela;

    /**
     * @var integer
     *
     * @ORM\Column(name="lay_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $layCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbUsuario
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usu_codigo", referencedColumnName="usu_codigo")
     * })
     */
    private $usuCodigo;



    /**
     * Set layFundoTela
     *
     * @param string $layFundoTela
     *
     * @return TbLayout
     */
    public function setLayFundoTela($layFundoTela)
    {
        $this->layFundoTela = $layFundoTela;

        return $this;
    }

    /**
     * Get layFundoTela
     *
     * @return string
     */
    public function getLayFundoTela()
    {
        return $this->layFundoTela;
    }

    /**
     * Set layMenuPrincipal
     *
     * @param string $layMenuPrincipal
     *
     * @return TbLayout
     */
    public function setLayMenuPrincipal($layMenuPrincipal)
    {
        $this->layMenuPrincipal = $layMenuPrincipal;

        return $this;
    }

    /**
     * Get layMenuPrincipal
     *
     * @return string
     */
    public function getLayMenuPrincipal()
    {
        return $this->layMenuPrincipal;
    }

    /**
     * Set layBotoesMenu
     *
     * @param string $layBotoesMenu
     *
     * @return TbLayout
     */
    public function setLayBotoesMenu($layBotoesMenu)
    {
        $this->layBotoesMenu = $layBotoesMenu;

        return $this;
    }

    /**
     * Get layBotoesMenu
     *
     * @return string
     */
    public function getLayBotoesMenu()
    {
        return $this->layBotoesMenu;
    }

    /**
     * Set layBotoesTela
     *
     * @param string $layBotoesTela
     *
     * @return TbLayout
     */
    public function setLayBotoesTela($layBotoesTela)
    {
        $this->layBotoesTela = $layBotoesTela;

        return $this;
    }

    /**
     * Get layBotoesTela
     *
     * @return string
     */
    public function getLayBotoesTela()
    {
        return $this->layBotoesTela;
    }

    /**
     * Set layTabela
     *
     * @param string $layTabela
     *
     * @return TbLayout
     */
    public function setLayTabela($layTabela)
    {
        $this->layTabela = $layTabela;

        return $this;
    }

    /**
     * Get layTabela
     *
     * @return string
     */
    public function getLayTabela()
    {
        return $this->layTabela;
    }

    /**
     * Set layTabelaLinhaPar
     *
     * @param string $layTabelaLinhaPar
     *
     * @return TbLayout
     */
    public function setLayTabelaLinhaPar($layTabelaLinhaPar)
    {
        $this->layTabelaLinhaPar = $layTabelaLinhaPar;

        return $this;
    }

    /**
     * Get layTabelaLinhaPar
     *
     * @return string
     */
    public function getLayTabelaLinhaPar()
    {
        return $this->layTabelaLinhaPar;
    }

    /**
     * Set layTabelaLinhaImpar
     *
     * @param string $layTabelaLinhaImpar
     *
     * @return TbLayout
     */
    public function setLayTabelaLinhaImpar($layTabelaLinhaImpar)
    {
        $this->layTabelaLinhaImpar = $layTabelaLinhaImpar;

        return $this;
    }

    /**
     * Get layTabelaLinhaImpar
     *
     * @return string
     */
    public function getLayTabelaLinhaImpar()
    {
        return $this->layTabelaLinhaImpar;
    }

    /**
     * Set layPassarMouseBotao
     *
     * @param string $layPassarMouseBotao
     *
     * @return TbLayout
     */
    public function setLayPassarMouseBotao($layPassarMouseBotao)
    {
        $this->layPassarMouseBotao = $layPassarMouseBotao;

        return $this;
    }

    /**
     * Get layPassarMouseBotao
     *
     * @return string
     */
    public function getLayPassarMouseBotao()
    {
        return $this->layPassarMouseBotao;
    }

    /**
     * Set layPassarMouseTabela
     *
     * @param string $layPassarMouseTabela
     *
     * @return TbLayout
     */
    public function setLayPassarMouseTabela($layPassarMouseTabela)
    {
        $this->layPassarMouseTabela = $layPassarMouseTabela;

        return $this;
    }

    /**
     * Get layPassarMouseTabela
     *
     * @return string
     */
    public function getLayPassarMouseTabela()
    {
        return $this->layPassarMouseTabela;
    }

    /**
     * Get layCodigo
     *
     * @return integer
     */
    public function getLayCodigo()
    {
        return $this->layCodigo;
    }

    /**
     * Set usuCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo
     *
     * @return TbLayout
     */
    public function setUsuCodigo(\SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo = null)
    {
        $this->usuCodigo = $usuCodigo;

        return $this;
    }

    /**
     * Get usuCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbUsuario
     */
    public function getUsuCodigo()
    {
        return $this->usuCodigo;
    }
}
