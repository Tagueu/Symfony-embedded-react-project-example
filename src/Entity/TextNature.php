<?php

namespace App\Entity;

use App\Repository\TextNatureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="natureTextes")
 * @ORM\Entity(repositoryClass=TextNatureRepository::class)
 */
class TextNature
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="libelle", type="string", length=190, unique=true)
     */
    private $title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
