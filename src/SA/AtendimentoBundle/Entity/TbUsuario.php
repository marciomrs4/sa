<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * TbUsuario
 *
 * @ORM\Table(name="tb_usuario", indexes={@ORM\Index(name="fk_tb_usuario_tb_departamento1", columns={"dep_codigo"}), @ORM\Index(name="fk_tb_usuario_tb_tipo_acesso1", columns={"tac_codigo"})})
 * @ORM\Entity
 */
class TbUsuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="usu_nome", type="string", length=45, nullable=false)
     */
    private $usuNome;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_sobrenome", type="string", length=45, nullable=true)
     */
    private $usuSobrenome;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_email", type="string", length=45, nullable=false)
     */
    private $usuEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_ramal", type="string", length=45, nullable=false)
     */
    private $usuRamal;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbTipoAcesso
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbTipoAcesso")
     * @ORM\JoinColumn(name="tac_codigo", referencedColumnName="tac_codigo")
     */

    private $tacCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_cargo", type="string", length=45, nullable=true)
     */
    private $usuCargo;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_drt", type="string", length=45, nullable=true)
     */
    private $usuDrt;

    /**
     * @var integer
     *
     * @ORM\Column(name="usu_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usuCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbDepartamento
     *
     * @ORM\ManyToOne(targetEntity="SA\AtendimentoBundle\Entity\TbDepartamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_codigo", referencedColumnName="dep_codigo")
     * })
     */
    private $depCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="usu_permite_atedimento", type="string", length=1, nullable=true)
     * @Assert\Length(max=1,maxMessage="Por favor Informe apenas a letra S pra SIM ou N pra NÃO")
     */
    private $usuPermiteAtedimento;

    /**
     * @return string
     */
    public function getUsuPermiteAtedimento()
    {
        return $this->usuPermiteAtedimento;
    }

    /**
     * @param string $usuPermiteAtedimento
     * @return TbUsuario
     */
    public function setUsuPermiteAtedimento($usuPermiteAtedimento)
    {
        $this->usuPermiteAtedimento = $usuPermiteAtedimento;
        return $this;
    }


    /**
     * Set usuNome
     *
     * @param string $usuNome
     *
     * @return TbUsuario
     */
    public function setUsuNome($usuNome)
    {
        $this->usuNome = $usuNome;

        return $this;
    }

    /**
     * Get usuNome
     *
     * @return string
     */
    public function getUsuNome()
    {
        return $this->usuNome;
    }

    /**
     * Set usuSobrenome
     *
     * @param string $usuSobrenome
     *
     * @return TbUsuario
     */
    public function setUsuSobrenome($usuSobrenome)
    {
        $this->usuSobrenome = $usuSobrenome;

        return $this;
    }

    /**
     * Get usuSobrenome
     *
     * @return string
     */
    public function getUsuSobrenome()
    {
        return $this->usuSobrenome;
    }

    /**
     * Set usuEmail
     *
     * @param string $usuEmail
     *
     * @return TbUsuario
     */
    public function setUsuEmail($usuEmail)
    {
        $this->usuEmail = $usuEmail;

        return $this;
    }

    /**
     * Get usuEmail
     *
     * @return string
     */
    public function getUsuEmail()
    {
        return $this->usuEmail;
    }

    /**
     * Set usuRamal
     *
     * @param string $usuRamal
     *
     * @return TbUsuario
     */
    public function setUsuRamal($usuRamal)
    {
        $this->usuRamal = $usuRamal;

        return $this;
    }

    /**
     * Get usuRamal
     *
     * @return string
     */
    public function getUsuRamal()
    {
        return $this->usuRamal;
    }

    /**
     * Set tacCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbTipoAcesso $depCodigo
     *
     * @return TbUsuario
     */
    public function setTacCodigo($tacCodigo)
    {
        $this->tacCodigo = $tacCodigo;

        return $this;
    }

    /**
     * Get tacCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbTipoAcesso
     */
    public function getTacCodigo()
    {
        return $this->tacCodigo;
    }

    /**
     * Set usuCargo
     *
     * @param string $usuCargo
     *
     * @return TbUsuario
     */
    public function setUsuCargo($usuCargo)
    {
        $this->usuCargo = $usuCargo;

        return $this;
    }

    /**
     * Get usuCargo
     *
     * @return string
     */
    public function getUsuCargo()
    {
        return $this->usuCargo;
    }

    /**
     * Set usuDrt
     *
     * @param string $usuDrt
     *
     * @return TbUsuario
     */
    public function setUsuDrt($usuDrt)
    {
        $this->usuDrt = $usuDrt;

        return $this;
    }

    /**
     * Get usuDrt
     *
     * @return string
     */
    public function getUsuDrt()
    {
        return $this->usuDrt;
    }

    /**
     * Get usuCodigo
     *
     * @return integer
     */
    public function getUsuCodigo()
    {
        return $this->usuCodigo;
    }

    /**
     * Set depCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbDepartamento $depCodigo
     *
     * @return TbUsuario
     */
    public function setDepCodigo(\SA\AtendimentoBundle\Entity\TbDepartamento $depCodigo = null)
    {
        $this->depCodigo = $depCodigo;

        return $this;
    }

    /**
     * Get depCodigo
     *
     * @return \SA\AtendimentoBundle\Entity\TbDepartamento
     */
    public function getDepCodigo()
    {
        return $this->depCodigo;
    }

    public function getId()
    {
        return $this->getUsuCodigo();
    }

    public function __toString()
    {
        return $this->getUsuNome() .' ' . $this->getUsuSobrenome();
    }
}
