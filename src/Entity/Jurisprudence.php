<?php

namespace App\Entity;

use App\Repository\JurisprudenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="jurisprudence")
 * @ORM\Entity(repositoryClass=JurisprudenceRepository::class)
 */
class Jurisprudence
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
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parties;

    /**
     * @ORM\Column(name="magistrats",type="text")
     */
    private $judges;

    /**
     * @ORM\Column(name="avocats",type="text")
     */
    private $lawyers;

    /**
     * @ORM\Column(name="references",type="string", length=255, nullable=true)
     */
    private $jReferences;
    
      /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Jurisdiction",
     * cascade={"persist"})
     * @ORM\JoinTable(name="jurisprudence_juridictions") 
     */
    private $juridictions;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DocumentarySource",
     * cascade={"persist"})
     * @ORM\JoinTable(name="jurisprudence_sourcesDocumentaires") 
     */
    private $sources;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Article",
     * cascade={"persist"})
     * @ORM\JoinTable(name="jurisprudence_articles") 
     */
    private $articles;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PrincipleAdage",
     * cascade={"persist"})
     * @ORM\JoinTable(name="jurisprudence_principesEtAdages") 
     */
    private $principles;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Code",
     * cascade={"persist"})
     * @ORM\JoinTable(name="jurisprudence_codes") 
     */
    private $codes;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Discipline",
     * cascade={"persist"})
     * @ORM\JoinTable(name="jurisprudence_disciplines") 
     */
    private $disciplines;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme",
     * cascade={"persist"})
     * @ORM\JoinTable(name="jurisprudence_themes") 
     */
    private $themes;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\People",
     * cascade={"persist"})
     * @ORM\JoinTable(name="jurisprudence_personnes") 
     */
    private $authors;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\People",
     * cascade={"persist"})
     * @ORM\JoinTable(name="jurisprudence_publications") 
     */
    private $publications;

    /**
     * @ORM\Column(name="disponible",type="boolean", nullable=true)
     */
    private $available;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $abstract;

    /**
     * @ORM\Column(name="observations",type="text", nullable=true)
     */
    private $observation;

    /**
     * @ORM\Column(name="lien", type="string", length=255, nullable=true)
     */
    private $attachment;

    public function __construct()
    {
        $this->juridictions = new ArrayCollection();
        $this->sources = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->principles = new ArrayCollection();
        $this->codes = new ArrayCollection();
        $this->disciplines = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getParties(): ?string
    {
        return $this->parties;
    }

    public function setParties(string $parties): self
    {
        $this->parties = $parties;

        return $this;
    }

    public function getJudges(): ?string
    {
        return $this->judges;
    }

    public function setJudges(string $judges): self
    {
        $this->judges = $judges;

        return $this;
    }

    public function getLawyers(): ?string
    {
        return $this->lawyers;
    }

    public function setLawyers(string $lawyers): self
    {
        $this->lawyers = $lawyers;

        return $this;
    }

    public function getJReferences(): ?string
    {
        return $this->jReferences;
    }

    public function setJReferences(?string $jReferences): self
    {
        $this->jReferences = $jReferences;

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

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setAbstract(?string $abstract): self
    {
        $this->abstract = $abstract;

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

    /**
     * @return Collection|Jurisdiction[]
     */
    public function getJuridictions(): Collection
    {
        return $this->juridictions;
    }

    public function addJuridiction(Jurisdiction $juridiction): self
    {
        if (!$this->juridictions->contains($juridiction)) {
            $this->juridictions[] = $juridiction;
        }

        return $this;
    }

    public function removeJuridiction(Jurisdiction $juridiction): self
    {
        $this->juridictions->removeElement($juridiction);

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
     * @return Collection|PrincipleAdage[]
     */
    public function getPrinciples(): Collection
    {
        return $this->principles;
    }

    public function addPrinciple(PrincipleAdage $principle): self
    {
        if (!$this->principles->contains($principle)) {
            $this->principles[] = $principle;
        }

        return $this;
    }

    public function removePrinciple(PrincipleAdage $principle): self
    {
        $this->principles->removeElement($principle);

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
     * @return Collection|People[]
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(People $publication): self
    {
        if (!$this->publications->contains($publication)) {
            $this->publications[] = $publication;
        }

        return $this;
    }

    public function removePublication(People $publication): self
    {
        $this->publications->removeElement($publication);

        return $this;
    }
}
