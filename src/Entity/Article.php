<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="libelle",type="string", length=190)
     */
    private $title;
    
      /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme",
     * cascade={"persist"})
     * @ORM\JoinTable(name="articles_themes") 
     */
    private $themes;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\People",
     * cascade={"persist"})
     * @ORM\JoinTable(name="articles_personnes") 
     */
    private $authors;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Publication",
     * cascade={"persist"})
     * @ORM\JoinTable(name="articles_publications") 
     */
    private $publications;
    
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type",
     * cascade={"persist"})
     */
    private $type;


    /**
     * @ORM\Column(name="enVigueur",type="boolean",nullable=true)
     */
    private $inForce;

    /**
     * @ORM\Column(name="modifie",type="boolean", nullable=true)
     */
    private $modified;

    /**
     * @ORM\Column(name="contenu",type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(name="observation",type="text", nullable=true)
     */
    private $observation;

    public function __construct()
    {
        $this->themes = new ArrayCollection();
        $this->authors = new ArrayCollection();
        $this->publications = new ArrayCollection();
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

    public function getInForce(): ?bool
    {
        return $this->inForce;
    }

    public function setInForce(bool $inForce): self
    {
        $this->inForce = $inForce;

        return $this;
    }

    public function getModified(): ?bool
    {
        return $this->modified;
    }

    public function setModified(?bool $modified): self
    {
        $this->modified = $modified;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
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

    /**
     * @return Collection|People[]
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(People $author): self
    {
        if (!$this->authors->contains($author)) {
            $this->authors[] = $author;
        }

        return $this;
    }

    public function removeAuthor(People $author): self
    {
        $this->authors->removeElement($author);

        return $this;
    }

    /**
     * @return Collection|Publication[]
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->publications->contains($publication)) {
            $this->publications[] = $publication;
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        $this->publications->removeElement($publication);

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
