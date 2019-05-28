<?php

namespace BrandcodeNL\NotificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\MappedSuperclass()
 */
class Notification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $title;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Url
     */
    private $link;
    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;    

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }
    public function getLink(): ?string
    {
        return $this->link;
    }
    public function setLink($link): self
    {
        $this->link = $link;
        return $this;
    }
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }
    public function setStartDate($startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }
}