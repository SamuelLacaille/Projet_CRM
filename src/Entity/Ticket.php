<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime")
     */
    private $heure;

  /**
     * @ORM\Column(type="string", length=255)
     */ 
    private $event;

    public function getId(): ?int
    {
        return $this->id;
    }





    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }
    

    public function getEvent(): ?string
    {
        return $this->event;
    }


    public function setEvent(string $event): self
    {
        $this->event = $event;

        return $this;
    }



}
