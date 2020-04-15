<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     attributes={"order"={"defaultOrder": "ASC"}},
 *     collectionOperations={"post"},
 *      itemOperations={"get"}
 *     )
 * @ORM\Entity(repositoryClass="App\Repository\NoteRepository")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     *  @Assert\Range(
     *      min = 0,
     *      max = 20
     * )
     * @ORM\Column(type="float")
     */
    private $note;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="text")
     */
    private $subject;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Student", inversedBy="notes")
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
