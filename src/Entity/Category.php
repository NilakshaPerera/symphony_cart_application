<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", unique=true)
     */
    private $id;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Book", mappedBy="category", cascade={"persist"})
     */
    private $book;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    /**
     * @return Collection|Book[]
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    /**
     * @ORM\Column(type="text" , length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at = NULL;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at = NULL;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }
}
