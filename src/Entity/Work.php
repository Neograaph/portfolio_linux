<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\WorkRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=WorkRepository::class)
 */
class Work
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"displayProject"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"displayProject"})
     */
    private $languages;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"displayProject"})
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     * @Groups ({"displayProject"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"displayProject"})
     */
    private $link_web;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"displayProject"})
     */
    private $link_repo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"displayProject"})
     */
    private $img;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLanguages(): ?string
    {
        return $this->languages;
    }

    public function setLanguages(string $languages): self
    {
        $this->languages = $languages;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLinkWeb(): ?string
    {
        return $this->link_web;
    }

    public function setLinkWeb(?string $link_web): self
    {
        $this->link_web = $link_web;

        return $this;
    }

    public function getLinkRepo(): ?string
    {
        return $this->link_repo;
    }

    public function setLinkRepo(?string $link_repo): self
    {
        $this->link_repo = $link_repo;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }
}
