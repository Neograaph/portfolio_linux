<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MessageRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     * @Groups ({"displayMessage"})
     * @Ignore()
     */
    private $user;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups ({"displayMessage"})
     */
    private $post_at;

    /**
     * @ORM\Column(type="text")
     * @Groups ({"displayMessage"})
     */
    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPostAt(): ?\DateTimeImmutable
    {
        return $this->post_at;
    }

    public function setPostAt(\DateTimeImmutable $post_at): self
    {
        $this->post_at = $post_at;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
