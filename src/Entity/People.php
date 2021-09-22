<?php

namespace App\Entity;

use App\Repository\PeopleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="personne")
 * @ORM\Entity(repositoryClass=PeopleRepository::class)
 */
class People
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="nom",type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="prenom",type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(name="fonction",type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(name="telephone1",type="string", length=255, nullable=true)
     */
    private $phone1;

    /**
     * @ORM\Column(name="telephone2",type="string", length=255, nullable=true)
     */
    private $phone2;

    /**
     * @ORM\Column(name="email1",type="string", length=255, nullable=true)
     */
    private $email1;

    /**
     * @ORM\Column(name="email2",type="string", length=255, nullable=true)
     */
    private $email2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pobox;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wathsapp;

    /**
     * @ORM\Column(name="pays",type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(name="ville",type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(name="quartier",type="string", length=255, nullable=true)
     */
    private $neighborhood;

    /**
     * @ORM\Column(name="maison",type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @ORM\Column(name="observations",type="text", nullable=true)
     */
    private $observation;

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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getPhone1(): ?string
    {
        return $this->phone1;
    }

    public function setPhone1(?string $phone1): self
    {
        $this->phone1 = $phone1;

        return $this;
    }

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(?string $phone2): self
    {
        $this->phone2 = $phone2;

        return $this;
    }

    public function getEmail1(): ?string
    {
        return $this->email1;
    }

    public function setEmail1(?string $email1): self
    {
        $this->email1 = $email1;

        return $this;
    }

    public function getEmail2(): ?string
    {
        return $this->email2;
    }

    public function setEmail2(?string $email2): self
    {
        $this->email2 = $email2;

        return $this;
    }

    public function getPobox(): ?string
    {
        return $this->pobox;
    }

    public function setPobox(?string $pobox): self
    {
        $this->pobox = $pobox;

        return $this;
    }

    public function getWathsapp(): ?string
    {
        return $this->wathsapp;
    }

    public function setWathsapp(?string $wathsapp): self
    {
        $this->wathsapp = $wathsapp;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    public function setNeighborhood(?string $neighborhood): self
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

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
}
