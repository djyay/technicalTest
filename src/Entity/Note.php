<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource(
 *     attributes={"order"={"defaultOrder": "ASC"}}
 *     )
 * @ORM\Entity(repositoryClass="App\Repository\NoteRepository")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull
     * * @Assert\Range(
     *      min = 0,
     *      max = 20,
     *      minMessage = "You must be at least {{ limit }} tall to enter",
     *      maxMessage = "You cannot be taller than {{ limit }} to enter"
     * )
     * @ORM\Column(type="float")
     *
     */
    private $note;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull
     * @ORM\Column(type="text")
     *
     */
    private $subject;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Student", inversedBy="notes")
     *
     */
    private $student;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }
}
