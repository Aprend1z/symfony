<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity(repositoryClass="App\Repository\PostsRepository")
*/
class Posts
{
  /**
  * @ORM\Id()
  * @ORM\GeneratedValue()
  * @ORM\Column(type="integer")
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $titulo;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $likes;

  /**
  * @ORM\Column(type="string", length=255, nullable=true)
  */
  private $foto;

  /**
  * @ORM\Column(type="datetime")
  */
  private $fecha_publicacion;

  /**
  * @ORM\Column(type="string", length=10000)
  */
  private $contenido;

  /**
  * @ORM\OneToMany(targetEntity="App\Entity\Comentarios", mappedBy="posts")
  */
  private $comentarios;

  /**
  * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="post")
  */
  private $user;

  public function __construct()
  {
    $this->likes = '';
    $this->fecha_publicacion = new \DateTime();
  }


  public function getId(): ?int
  {
    return $this->id;
  }

  public function getTitulo(): ?string
  {
    return $this->titulo;
  }

  public function setTitulo(string $titulo): self
  {
    $this->titulo = $titulo;

    return $this;
  }

  public function getLikes(): ?string
  {
    return $this->likes;
  }

  public function setLikes(string $likes): self
  {
    $this->likes = $likes;

    return $this;
  }

  public function getFoto(): ?string
  {
    return $this->foto;
  }

  public function setFoto(string $foto): self
  {
    $this->foto = $foto;

    return $this;
  }

  public function getFechaPublicacion(): ?\DateTimeInterface
  {
    return $this->fecha_publicacion;
  }

  public function setFechaPublicacion(\DateTimeInterface $fecha_publicacion): self
  {
    $this->fecha_publicacion = $fecha_publicacion;

    return $this;
  }

  public function getContenido(): ?string
  {
    return $this->contenido;
  }

  public function setContenido(string $contenido): self
  {
    $this->contenido = $contenido;

    return $this;
  }
  public function getComentarios(): ?string
  {
    return $this->comentarios;
  }

  public function setComentarios(string $comentarios): self
  {
    $this->comentarios = $comentarios;

    return $this;
  }

  public function getUser(): ?string
  {
    return $this->user;
  }

  public function setUser(string $user): self
  {
    $this->user = $user;

    return $this;
  }
}
