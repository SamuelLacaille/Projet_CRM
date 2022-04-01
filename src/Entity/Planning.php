<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanningRepository::class)
 */
class Planning
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fin;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $jourComplet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailRdv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailCommercial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

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

    public function getJourComplet(): ?bool
    {
        return $this->jourComplet;
    }

    public function setJourComplet(bool $jourComplet): self
    {
        $this->jourComplet = $jourComplet;

        return $this;
    }

    public function getEmailRdv(): ?string
    {
        return $this->emailRdv;
    }

    public function setEmailRdv(string $emailRdv): self
    {
        $this->emailRdv = $emailRdv;

        return $this;
    }

    public function getEmailCommercial(): ?string
    {
        return $this->emailCommercial;
    }

    public function setEmailCommercial(string $emailCommercial): self
    {
        $this->emailCommercial = $emailCommercial;

        return $this;
    }
}
