<?php

namespace App\Entity;

use App\Repository\TeletravailFormRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeletravailFormRepository::class)]
class TeletravailForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $natureContrat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quotite = null;

    #[ORM\Column(nullable: true)]
    private ?bool $avisManager = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaireManager = null;

    #[ORM\Column(nullable: true)]
    private ?bool $avisDRH = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaireDRH = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNatureContrat(): ?string
    {
        return $this->natureContrat;
    }

    public function setNatureContrat(?string $natureContrat): static
    {
        $this->natureContrat = $natureContrat;

        return $this;
    }

    public function getQuotite(): ?string
    {
        return $this->quotite;
    }

    public function setQuotite(?string $quotite): static
    {
        $this->quotite = $quotite;

        return $this;
    }

    public function isAvisManager(): ?bool
    {
        return $this->avisManager;
    }

    public function setAvisManager(?bool $avisManager): static
    {
        $this->avisManager = $avisManager;

        return $this;
    }

    public function getCommentaireManager(): ?string
    {
        return $this->commentaireManager;
    }

    public function setCommentaireManager(?string $commentaireManager): static
    {
        $this->commentaireManager = $commentaireManager;

        return $this;
    }

    public function isAvisDRH(): ?bool
    {
        return $this->avisDRH;
    }

    public function setAvisDRH(?bool $avisDRH): static
    {
        $this->avisDRH = $avisDRH;

        return $this;
    }

    public function getCommentaireDRH(): ?string
    {
        return $this->commentaireDRH;
    }

    public function setCommentaireDRH(?string $commentaireDRH): static
    {
        $this->commentaireDRH = $commentaireDRH;

        return $this;
    }
}
