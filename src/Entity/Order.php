<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderItem", mappedBy="order")
     */
    private $order;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    /**
     * @return Collection|OrderItem[]
     */
    public function getOrderItem(): Collection
    {
        return $this->order;
    }



    // /**
    //  * @ORM\ManyToOne(targetEntity="App\Entity\Coupon", inversedBy="Order")
    //  */
    // private $coupon;

    // public function getCoupon(): ?Coupon
    // {
    //     return $this->coupon;
    // }

    // public function setCoupon(?Coupon $coupon): self
    // {
    //     $this->coupon = $coupon;
    //     return $this;
    // }


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coupon_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\Column(type="float")
     */
    private $net;

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

    public function getCouponId(): ?int
    {
        return $this->coupon_id;
    }

    public function setCouponId(?int $coupon_id): self
    {
        $this->coupon_id = $coupon_id;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
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

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getNet(): ?float
    {
        return $this->net;
    }

    public function setNet(float $net): self
    {
        $this->net = $net;

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
