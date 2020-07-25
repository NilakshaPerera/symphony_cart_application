<?php

namespace App\Entity;

use App\Repository\OrderItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderItemRepository::class)
 */
class OrderItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    // /**
    //  * @ORM\ManyToOne(targetEntity="App\Entity\Order", inversedBy="OrderItem")
    //  */
    // private $order;

    // public function getOrder(): ?Order
    // {
    //     return $this->order;
    // }

    // public function setOrder(?Order $order): self
    // {
    //     $this->order = $order;
    //     return $this;
    // }

    /**
     * @ORM\Column(type="integer")
     */
    private $order_id;

    // /**
    //  * @ORM\OneToOne(targetEntity="App\Entity\Book", inversedBy="OrderItem")
    //  */
    // private $book;

    // public function getBook(): ?Book
    // {
    //     return $this->book;
    // }

    // public function setBook(?Book $book): self
    // {
    //     $this->book = $book;
    //     return $this;
    // }


    /**
     * @ORM\Column(type="integer")
     */
    private $book_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderId(): ?int
    {
        return $this->order_id;
    }

    public function setOrderId(int $order_id): self
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getBookId(): ?int
    {
        return $this->book_id;
    }

    public function setBookId(int $book_id): self
    {
        $this->book_id = $book_id;

        return $this;
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
