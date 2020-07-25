<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", unique=true)
     */
    private $id;

    // /**
    //  * @ORM\OneToMany(targetEntity="App\Entity\OrderItem", mappedBy="order")
    //  */
    // private $order;

    // public function __construct()
    // {
    //     $this->book = new ArrayCollection();
    // }

    // /**
    //  * @return Collection|OrderItem[]
    //  */
    // public function getOrderItem(): Collection
    // {
    //     return $this->order;
    // }


    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="book")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    public function setCategory(?Category $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }




    /**
     * @ORM\Column(type="integer")
     */
    private $category_id;

    /**
     * @ORM\Column(type="text" , length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text" , length=100)
     */
    private $author;

    /**
     * @ORM\Column(type="text" , length=100)
     */
    private $isbn;

    /**
     * @ORM\Column(type="text" , length=10)
     */
    private $price;

    /**
     * @ORM\Column(type="text" , length=500)
     */
    private $image;

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

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
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
