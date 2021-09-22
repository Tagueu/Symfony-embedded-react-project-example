<?php

namespace App\Entity;

use App\Repository\TextRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="textes")
 * @ORM\Entity(repositoryClass=TextRepository::class)
 */
class Text
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
     * @ORM\ManyToOne(targetEntity="App\Entity\TextNature",
     * cascade={"persist"})
     *
     */
    private $textNature;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme",
     * cascade={"persist"})
     * @ORM\JoinTable(name="textes_themes") 
     */
    private $themes;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(name="references",type="string", length=255, nullable=true)
     */
    private $tReferences;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DocumentarySource",
     * cascade={"persist"})
     * @ORM\JoinTable(name="textes_sourcesDocumentaires") 
     */
    private $documentarySources;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\People",
     * cascade={"persist"})
     * @ORM\JoinTable(name="textes_personnes") 
     */
    private $authors;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type",
     * cascade={"persist"})
     */
    private $type;
    
      /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Discipline",
     * cascade={"persist"})
     * @ORM\JoinTable(name="textes_disciplines") 
     */
    private $disciplines;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Article",
     * cascade={"persist"})
     * @ORM\JoinTable(name="textes_articles") 
     */
    private $articles;

    /**
     * @ORM\Column(name="disponible",type="boolean", nullable=true)
     */
    private $available;

    /**
     * @ORM\Column(name="enVigueur",type="boolean", nullable=true)
     */
    private $inForce;

    /**
     * @ORM\Column(name="modifie", type="boolean", nullable=true)
     */
    private $modified;

    /**
     * @ORM\Column(name="observations",type="text", nullable=true)
     */
    private $observation;

    /**
     * @ORM\Column(name="lien",type="string", length=255, nullable=true)
     */
    private $attachment;

    public function __construct()
    {
        $this->themes = new ArrayCollection();
        $this->documentarySources = new ArrayCollection();
        $this->disciplines = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->authors = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTReferences(): ?string
    {
        return $this->tReferences;
    }

    public function setTReferences(?string $tReferences): self
    {
        $this->tReferences = $tReferences;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(?bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getInForce(): ?bool
    {
        return $this->inForce;
    }

    public function setInForce(?bool $inForce): self
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

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function setAttachment(?string $attachment): self
    {
        $this->attachment = $attachment;

        return $this;
    }

    public function getTextNature(): ?TextNature
    {
        return $this->textNature;
    }

    public function setTextNature(?TextNature $textNature): self
    {
        $this->textNature = $textNature;

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
     * @return Collection|DocumentarySource[]
     */
    public function getDocumentarySources(): Collection
    {
        return $this->documentarySources;
    }

    public function addDocumentarySource(DocumentarySource $documentarySource): self
    {
        if (!$this->documentarySources->contains($documentarySource)) {
            $this->documentarySources[] = $documentarySource;
        }

        return $this;
    }

    public function removeDocumentarySource(DocumentarySource $documentarySource): self
    {
        $this->documentarySources->removeElement($documentarySource);

        return $this;
    }

    /**
     * @return Collection|Discipline[]
     */
    public function getDisciplines(): Collection
    {
        return $this->disciplines;
    }

    public function addDiscipline(Discipline $discipline): self
    {
        if (!$this->disciplines->contains($discipline)) {
            $this->disciplines[] = $discipline;
        }

        return $this;
    }

    public function removeDiscipline(Discipline $discipline): self
    {
        $this->disciplines->removeElement($discipline);

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        $this->articles->removeElement($article);

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
