<?php

namespace App\Entity;

use App\Repository\CouponRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CouponRepository::class)
 */
class Coupon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="coupon")
     */
    private $order;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrder(): Collection
    {
        return $this->order;
    }

    /**
     * @ORM\Column(type="text" , length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $discount;

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

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
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
