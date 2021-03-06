<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 * @UniqueEntity(fields={"title", "author"}, message="Эта книга уже имеется в библиотеке!")
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=100)
     * @Assert\NotNull
     */
    private $title;

    /**
     * @ORM\Column(type="text", length=100)
     * @Assert\NotNull
     */
    private $author;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     * @Assert\Length(
     *   max=4,
     *   maxMessage="Введите правильный год"
     * )
     */
    private $year;

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
      return $this->title;
    }

    public function setTitle(string $title): Book {
      $this->title = $title;
      return $this;
    }

    public function getAuthor(): string {
      return $this->author;
    }

    public function setAuthor(string $author): Book {
      $this->author = $author;
      return $this;
    }

    public function getYear(): int {
      return $this->year;
    }

    public function setYear(int $year): Book {
      $this->year = $year;
      return $this;
    }

}
