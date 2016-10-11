<?php

namespace SA\AtendimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;


/**
 * TbAcesso
 *
 * @ORM\Table(name="tb_acesso", uniqueConstraints={@ORM\UniqueConstraint(name="ace_usuario_UNIQUE", columns={"ace_usuario"})}, indexes={@ORM\Index(name="fk_tb_acesso_tb_usuario", columns={"usu_codigo"})})
 * @ORM\Entity(repositoryClass="SA\AtendimentoBundle\Repository\AcessoRepository")
 * @UniqueEntity(fields="aceUsuario", message="Este acesso já existe")
 */
class TbAcesso implements AdvancedUserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="ace_usuario", type="string", length=45, nullable=false)
     * @Assert\NotBlank(message="Informe um nome de usuário valido")
     */
    private $aceUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="ace_senha", type="string", length=255, nullable=false)
     */
    private $aceSenha;

    /**
     * @var string
     *
     * @ORM\Column(name="ace_ativo", type="string", length=1, nullable=false)
     */
    private $aceAtivo = 'S';

    /**
     * @var integer
     *
     * @ORM\Column(name="ace_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aceCodigo;

    /**
     * @var \SA\AtendimentoBundle\Entity\TbUsuario
     *
     * @ORM\OneToOne(targetEntity="SA\AtendimentoBundle\Entity\TbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usu_codigo", referencedColumnName="usu_codigo")
     * })
     */
    private $usuCodigo;


    public function __construct()
    {
        $this->aceAtivo = 'S';
    }


    /**
     * Set aceUsuario
     *
     * @param string $aceUsuario
     *
     * @return TbAcesso
     */
    public function setAceUsuario($aceUsuario)
    {
        $this->aceUsuario = $aceUsuario;

        return $this;
    }

    /**
     * Get aceUsuario
     *
     * @return string
     */
    public function getAceUsuario()
    {
        return $this->aceUsuario;
    }

    /**
     * Set aceSenha
     *
     * @param string $aceSenha
     *
     * @return TbAcesso
     */
    public function setAceSenha($aceSenha)
    {
        $this->aceSenha = $aceSenha;

        return $this;
    }

    /**
     * Get aceSenha
     *
     * @return string
     */
    public function getAceSenha()
    {
        return $this->aceSenha;
    }

    /**
     * Set aceAtivo
     *
     * @param string $aceAtivo
     *
     * @return TbAcesso
     */
    public function setAceAtivo($aceAtivo)
    {
        $this->aceAtivo = $aceAtivo;

        return $this;
    }

    /**
     * Get aceAtivo
     *
     * @return string
     */
    public function getAceAtivo()
    {
        return $this->aceAtivo;
    }

    /**
     * Get aceCodigo
     *
     * @return integer
     */
    public function getAceCodigo()
    {
        return $this->aceCodigo;
    }

    /**
     * Set usuCodigo
     *
     * @param \SA\AtendimentoBundle\Entity\TbUsuario $usuCodigo
     *
     * @return TbAcesso
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

    /**
     * Checks whether the user's account has expired.
     *
     * Internally, if this method returns false, the authentication system
     * will throw an AccountExpiredException and prevent login.
     *
     * @return bool true if the user's account is non expired, false otherwise
     *
     * @see AccountExpiredException
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * Checks whether the user is locked.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a LockedException and prevent login.
     *
     * @return bool true if the user is not locked, false otherwise
     *
     * @see LockedException
     */
    public function isAccountNonLocked()
    {
        return true;
    }

    /**
     * Checks whether the user's credentials (password) has expired.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a CredentialsExpiredException and prevent login.
     *
     * @return bool true if the user's credentials are non expired, false otherwise
     *
     * @see CredentialsExpiredException
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * Checks whether the user is enabled.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a DisabledException and prevent login.
     *
     * @return bool true if the user is enabled, false otherwise
     *
     * @see DisabledException
     */
    public function isEnabled()
    {
        return $this->getAceAtivo() == 'S';
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        //return ['ROLE_USER','ROLE_ADMIN','ROLE_ADM','ROLE_éáíó'];

        return [$this->getUsuCodigo()->getTacCodigo()->getTacDescricao()];

    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->getAceSenha();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return NULL;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getAceUsuario();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        //return $this->setAceSenha(null);
    }

    public function __toString()
    {
        return $this->getUsername();
    }

    public function getId()
    {
        return $this->getAceCodigo();
    }

}
