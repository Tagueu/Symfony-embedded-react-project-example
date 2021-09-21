<?php

namespace App\Entity;

use App\Repository\CodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="codes")
 * @ORM\Entity(repositoryClass=CodeRepository::class)
 */
class Code
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
     * @ORM\Column(name="numeroEdition",type="string", length=255)
     */
    private $editionNumber;

    /**
     * @ORM\Column(type="date")
     */
    private $date;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Discipline",
     * cascade={"persist"})
     * @ORM\JoinTable(name="codes_disciplines") 
     */
    private $disciplines;
    
     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Text",
     * cascade={"persist"})
     * @ORM\JoinTable(name="codes_textes") 
     */
    private $texts;

    /**
     * @ORM\Column(name="observations",type="text", nullable=true)
     */
    private $observation;

    public function __construct()
    {
        $this->disciplines = new ArrayCollection();
        $this->texts = new ArrayCollection();
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

    public function getEditionNumber(): ?string
    {
        return $this->editionNumber;
    }

    public function setEditionNumber(string $editionNumber): self
    {
        $this->editionNumber = $editionNumber;

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
     * @return Collection|Text[]
     */
    public function getTexts(): Collection
    {
        return $this->texts;
    }

    public function addText(Text $text): self
    {
        if (!$this->texts->contains($text)) {
            $this->texts[] = $text;
        }

        return $this;
    }

    public function removeText(Text $text): self
    {
        $this->texts->removeElement($text);

        return $this;
    }

   
}
