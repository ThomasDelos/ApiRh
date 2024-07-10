<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
//use App\State\UserStateProcessor;

#[ApiResource(
)]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]

    private ?string $lastname = null;

    #[ORM\Column(length: 255)]

    private ?string $firstname = null;

    #[ORM\Column(length: 255)]

    private ?string $workingplace = null;

    #[ORM\Column]

    private ?int $countReminder = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]

    private ?\DateTimeInterface $lastReminder = null;


    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]

    private ?Role $idRole = null;

    #[ORM\ManyToOne(targetEntity: self::class)]
    private ?self $id_manager = null;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getWorkingplace(): ?string
    {
        return $this->workingplace;
    }

    public function setWorkingplace(string $workingplace): static
    {
        $this->workingplace = $workingplace;

        return $this;
    }

    public function getCountReminder(): ?int
    {
        return $this->countReminder;
    }

    public function setCountReminder(int $countReminder): static
    {
        $this->countReminder = $countReminder;

        return $this;
    }

    public function getLastReminder(): ?\DateTimeInterface
    {
        return $this->lastReminder;
    }

    public function setLastReminder(\DateTimeInterface $lastReminder): static
    {
        $this->lastReminder = $lastReminder;

        return $this;
    }


    public function getIdRole(): ?Role
    {
        return $this->idRole;
    }

    public function setIdRole(?Role $idRole): static
    {
        $this->idRole = $idRole;

        return $this;
    }

    public function getIdManager(): ?self
    {
        return $this->id_manager;
    }

    public function setIdManager(?self $id_manager): static
    {
        $this->id_manager = $id_manager;

        return $this;
    }


}
