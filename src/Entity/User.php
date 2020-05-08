<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
* @ORM\Entity(repositoryClass="App\Repository\UserRepository")
* @ORM\Table(name="`user`")
*/
class User implements UserInterface
{
  const MSG_REGISTRO_OK = 'se ha registrado exitosamente';
  /**
  * @ORM\Id()
  * @ORM\GeneratedValue()
  * @ORM\Column(type="integer")
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=180, unique=true)
  */
  private $email;

  /**
  * @ORM\Column(type="json")
  */
  private $roles = [];

  /**
  * @var string The hashed password
  * @ORM\Column(type="string")
  */
  private $password;

  /**
  * @var boolean Para ver si está baneado
  * @ORM\Column(type="boolean")
  */
  private $baneado;

  /**
  * @var string El nombre del usuario
  * @ORM\Column(type="string")
  */
  private $nombre;

  /**
  * @ORM\OneToMany(targetEntity="App\Entity\Comentarios", mappedBy="user")
  */
  private $comentarios;

  /**
  * @ORM\OneToMany(targetEntity="App\Entity\Posts", mappedBy="user")
  */
  private $posts;

  /**
  * @ORM\OneToMany(targetEntity="App\Entity\Profesion", mappedBy="user")
  */
  private $profesion;

  public function __construct()
  {
    $this->baneado = false;
    $this->roles = ['ROLE_USER'];
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function getBaneado(): ?boolean
  {
    return $this->baneado;
  }

  public function getNombre(): ?string
  {
    return $this->nombre;
  }

  public function setEmail(string $email): self
  {
    $this->email = $email;

    return $this;
  }

  public function setBaneado(bool $baneado): self
  {
    $this->baneado = $baneado;

    return $this;
  }

  public function setNombre(string $nombre): self
  {
    $this->nombre = $nombre;

    return $this;
  }
  /**
  * A visual identifier that represents this user.
  *
  * @see UserInterface
  */
  public function getUsername(): string
  {
    return (string) $this->email;
  }

  /**
  * @see UserInterface
  */
  public function getRoles(): array
  {
    $roles = $this->roles;
    // guarantee every user at least has ROLE_USER
    $roles[] = 'ROLE_USER';

    return array_unique($roles);
  }

  public function setRoles(array $roles): self
  {
    $this->roles = $roles;

    return $this;
  }

  /**
  * @see UserInterface
  */
  public function getPassword(): string
  {
    return (string) $this->password;
  }

  public function setPassword(string $password): self
  {
    $this->password = $password;

    return $this;
  }

  /**
  * @see UserInterface
  */
  public function getSalt()
  {
    // not needed when using the "bcrypt" algorithm in security.yaml
  }

  /**
  * @see UserInterface
  */
  public function eraseCredentials()
  {
    // If you store any temporary, sensitive data on the user, clear it here
    // $this->plainPassword = null;
  }
}
