<?php

namespace App\Entity;

use App\Repository\ContainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;

#[ApiResource(operations: [
    new GetCollection(),
    new Post(),
    new Get(),
    new Put(),
    new Patch(),
    new Delete(),
    ],)]

#[ORM\Entity(repositoryClass: ContainRepository::class)]
class Contain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $workHours = null;

    #[ORM\Column]
    private ?int $offHours = null;

    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?WorkDay $workday = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TimeSheet $timesheet = null;


    public function __construct()
    {
        $this->id_workday = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorkHours(): ?int
    {
        return $this->workHours;
    }

    public function setWorkHours(int $workHours): static
    {
        $this->workHours = $workHours;

        return $this;
    }

    public function getOffHours(): ?int
    {
        return $this->offHours;
    }

    public function setOffHours(int $offHours): static
    {
        $this->offHours = $offHours;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getWorkday(): ?Workday
    {
        return $this->workday;
    }

    public function setWorkday(?Workday $workday): static
    {
        $this->workday = $workday;

        return $this;
    }

    public function getTimesheet(): ?TimeSheet
    {
        return $this->timesheet;
    }

    public function setTimesheet(?TimeSheet $timesheet): static
    {
        $this->timesheet = $timesheet;

        return $this;
    }

}
