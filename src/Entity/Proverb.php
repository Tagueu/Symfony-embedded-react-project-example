<?php

namespace App\Entity;

use App\Repository\ProverbRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="proverbes")
 * @ORM\Entity(repositoryClass=ProverbRepository::class)
 */
class Proverb
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="libelle",type="string", length=190, unique=true)
     */
    private $title;

    /**
     * @ORM\Column(name="auteurs", type="string", length=255)
     */
    private $author;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme",
     * cascade={"persist"})
     * @ORM\JoinTable(name="proverbes_themes") 
     */
    private $themes;

    /**
     * @ORM\Column(name="signification", type="string", length=255)
     */
    private $meaning;

    /**
     * @ORM\Column(name="observation", type="text")
     */
    private $observation;

    public function __construct()
    {
        $this->themes = new ArrayCollection();
    }

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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getMeaning(): ?string
    {
        return $this->meaning;
    }

    public function setMeaning(string $meaning): self
    {
        $this->meaning = $meaning;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * @return Collection|Theme[]
     */
    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function addTheme(Theme $theme): self
    {
        if (!$this->themes->contains($theme)) {
            $this->themes[] = $theme;
        }

        return $this;
    }

    public function removeTheme(Theme $theme): self
    {
        $this->themes->removeElement($theme);

        return $this;
    }
}
