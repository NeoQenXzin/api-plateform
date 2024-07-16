<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
//Ajouter pour les contraintes (not blank, length...)
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(paginationClientItemsPerPage: true, paginationItemsPerPage: 5)]
#[ApiFilter(SearchFilter::class, properties: ['title' => 'ipartial'])]
#[ApiFilter(OrderFilter::class, properties: ['title'])]

class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    // #[ApiProperty(readable: false)]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[Assert\NotBlank(message: "L'auteur doit être renseigné")]
    #[Assert\Length(min: 3, minMessage: "Le nom de l'auteur doit contenir au moins 3 caractères")]
    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[Assert\Length(exactly: 4)]
    #[ORM\Column(length: 4, nullable: true)]
    #[ApiProperty(writable: false)]
    private ?string $year = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): static
    {
        $this->year = $year;

        return $this;
    }
}
