<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateDebut = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateFin = null;

    #[ORM\Column(length: 255)]
    private ?string $loyer = null;

    #[ORM\Column(length: 255)]
    private ?string $caution = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $signatureId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $documentId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $signerId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pdfSansSignature = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $signatureDataUrl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeImmutable
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeImmutable $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeImmutable
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeImmutable $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getLoyer(): ?string
    {
        return $this->loyer;
    }

    public function setLoyer(string $loyer): static
    {
        $this->loyer = $loyer;

        return $this;
    }

    public function getCaution(): ?string
    {
        return $this->caution;
    }

    public function setCaution(string $caution): static
    {
        $this->caution = $caution;

        return $this;
    }

    public function getSignatureId(): ?string
    {
        return $this->signatureId;
    }

    public function setSignatureId(?string $signatureId): static
    {
        $this->signatureId = $signatureId;

        return $this;
    }

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): static
    {
        $this->documentId = $documentId;

        return $this;
    }

    public function getSignerId(): ?string
    {
        return $this->signerId;
    }

    public function setSignerId(?string $signerId): static
    {
        $this->signerId = $signerId;

        return $this;
    }

    public function getPdfSansSignature(): ?string
    {
        return $this->pdfSansSignature;
    }

    public function setPdfSansSignature(?string $pdfSansSignature): static
    {
        $this->pdfSansSignature = $pdfSansSignature;

        return $this;
    }

    public function getSignatureDataUrl(): ?string
    {
        return $this->signatureDataUrl;
    }

    public function setSignatureDataUrl(?string $signatureDataUrl): static
    {
        $this->signatureDataUrl = $signatureDataUrl;

        return $this;
    }
}
