<?php

namespace App\Entity;

use App\Repository\TimeSheetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource(paginationItemsPerPage: 10)]

#[ORM\Entity(repositoryClass: TimeSheetRepository::class)]
class TimeSheet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $period = null;

    #[ORM\Column]
    private ?bool $userStatus = null;

    #[ORM\ManyToOne(inversedBy: 'id_user')]
    private ?User $id_user = null;

    public function __construct()
    {
        $this->id_timesheet = new ArrayCollection();
        $this->id_timeSheet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): static
    {
        $this->period = $period;

        return $this;
    }

    public function isUserStatus(): ?bool
    {
        return $this->userStatus;
    }

    public function setUserStatus(bool $userStatus): static
    {
        $this->userStatus = $userStatus;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }
}
