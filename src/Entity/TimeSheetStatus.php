<?php

namespace App\Entity;

use App\Repository\TimeSheetStatusRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource(paginationItemsPerPage: 10)]
#[ORM\Entity(repositoryClass: TimeSheetStatusRepository::class)]
class TimeSheetStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $managerStatus = null;

    #[ORM\ManyToOne]
    private ?TimeSheet $timeSheet = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $manager = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isManagerStatus(): ?bool
    {
        return $this->managerStatus;
    }

    public function setManagerStatus(bool $managerStatus): static
    {
        $this->managerStatus = $managerStatus;

        return $this;
    }

    public function getTimeSheet(): ?TimeSheet
    {
        return $this->timeSheet;
    }

    public function setTimeSheet(?TimeSheet $timeSheet): static
    {
        $this->timeSheet = $timeSheet;

        return $this;
    }

    public function getManager(): ?User
    {
        return $this->manager;
    }

    public function setManager(?User $manager): static
    {
        $this->manager = $manager;

        return $this;
    }
}
