<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity=Roles::class, mappedBy="userId")
     */
    private $roles;

    /**
     * @ORM\OneToMany(targetEntity=NewsDetails::class, mappedBy="userId")
     */
    private $newsDetails;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
        $this->newsDetails = new ArrayCollection();
    }

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

    public function getEmailId(): ?string
    {
        return $this->emailId;
    }

    public function setEmailId(string $emailId): self
    {
        $this->emailId = $emailId;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, Roles>
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Roles $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
            $role->addUserId($this);
        }

        return $this;
    }

    public function removeRole(Roles $role): self
    {
        if ($this->roles->removeElement($role)) {
            $role->removeUserId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, NewsDetails>
     */
    public function getNewsDetails(): Collection
    {
        return $this->newsDetails;
    }

    public function addNewsDetail(NewsDetails $newsDetail): self
    {
        if (!$this->newsDetails->contains($newsDetail)) {
            $this->newsDetails[] = $newsDetail;
            $newsDetail->setUserId($this);
        }

        return $this;
    }

    public function removeNewsDetail(NewsDetails $newsDetail): self
    {
        if ($this->newsDetails->removeElement($newsDetail)) {
            // set the owning side to null (unless already changed)
            if ($newsDetail->getUserId() === $this) {
                $newsDetail->setUserId(null);
            }
        }

        return $this;
    }

    public function __toString(){
        // to show the name of the Category in the select
        return $this->name;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
