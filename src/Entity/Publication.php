<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PublicationRepository::class)
 */
class Publication
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="libelle",type="string", length=190,unique=true)
     */
    private $title;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(name="references",type="string", length=255, nullable=true)
     */
    private $pRefererences;
    
     
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DocumentarySource",
     * cascade={"persist"})
     * @ORM\JoinTable(name="publications_sourcesDocumentaires") 
     */
    private $sources;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\People",
     * cascade={"persist"})
     * @ORM\JoinTable(name="publications_personnes") 
     */
    private $authors;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Code",
     * cascade={"persist"})
     * @ORM\JoinTable(name="publications_codes") 
     */
    private $codes;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Discipline",
     * cascade={"persist"})
     * @ORM\JoinTable(name="publications_disciplines") 
     */
    private $disciplines;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme",
     * cascade={"persist"})
     * @ORM\JoinTable(name="publications_themes") 
     */
    private $themes;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type",
     * cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $type;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Article",
     * cascade={"persist"})
     * @ORM\JoinTable(name="publications_articles") 
     */
    private $articles;


    /**
     * @ORM\Column(name="disponible",type="boolean", nullable=true)
     */
    private $available;

    /**
     * @ORM\Column(name="observations",type="text", nullable=true)
     */
    private $observation;

    /**
     * @ORM\Column(name="lien",type="string", length=255, nullable=true)
     */
    private $link;

    public function __construct()
    {
        $this->sources = new ArrayCollection();
        $this->codes = new ArrayCollection();
        $this->disciplines = new ArrayCollection();
        $this->themes = new ArrayCollection();
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

    public function getPRefererences(): ?string
    {
        return $this->pRefererences;
    }

    public function setPRefererences(?string $pRefererences): self
    {
        $this->pRefererences = $pRefererences;

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

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection|DocumentarySource[]
     */
    public function getSources(): Collection
    {
        return $this->sources;
    }

    public function addSource(DocumentarySource $source): self
    {
        if (!$this->sources->contains($source)) {
            $this->sources[] = $source;
        }

        return $this;
    }

    public function removeSource(DocumentarySource $source): self
    {
        $this->sources->removeElement($source);

        return $this;
    }

    /**
     * @return Collection|Code[]
     */
    public function getCodes(): Collection
    {
        return $this->codes;
    }

    public function addCode(Code $code): self
    {
        if (!$this->codes->contains($code)) {
            $this->codes[] = $code;
        }

        return $this;
    }

    public function removeCode(Code $code): self
    {
        $this->codes->removeElement($code);

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

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

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
}
