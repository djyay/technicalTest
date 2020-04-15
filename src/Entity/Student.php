<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\AverageStudentController;
use App\Controller\AverageTotalClassController;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     attributes={"order"={"defaultOrder": "ASC"}},
 *     collectionOperations={
 *      "post",
 *      "get_averageTotalClass"={
 *         "method"="GET",
 *         "path"="/students/average/class",
 *         "controller"=AverageTotalClassController::class,
 *     "read"=false
 *     }
 *     },
 *     itemOperations={
 *          "delete",
 *          "get",
 *          "put",
 *         "get_arevageStudent"={
 *         "method"="GET",
 *         "path"="/students/{id}/average",
 *         "controller"=AverageStudentController::class,
 *     }}
 * )
 *
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 */
class Student
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
     * @Assert\Type("string")
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @Assert\NotBlank
     * @Assert\Type(\DateTimeInterface::class)
     * @ORM\Column(type="datetime")
     */
    private $dateOfBirth;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="student", cascade={"remove"})
     *
     */
    private $notes;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $DateOfBirth): self
    {
        $this->DateOfBirth = $DateOfBirth;

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setStudent($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getStudent() === $this) {
                $note->setStudent(null);
            }
        }

        return $this;
    }
}
