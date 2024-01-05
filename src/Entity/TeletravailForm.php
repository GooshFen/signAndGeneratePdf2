<?php

namespace App\Entity;

use App\Repository\TeletravailFormRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeletravailFormRepository::class)]
class TeletravailForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $natureContrat = null;

    #[ORM\Column(length: 255)]
    private ?string $quotite = null;

    #[ORM\Column]
    private ?bool $connexionInternet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attestationHonneur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attestationAssurance = null;

    #[ORM\Column]
    private ?bool $activiteEligible = null;

    #[ORM\Column]
    private ?bool $periodeEssaiEnCours = null;

    #[ORM\Column]
    private ?bool $autonomieSuffisante = null;

    #[ORM\Column]
    private ?bool $conditionsEligibilites = null;

    #[ORM\Column]
    private ?bool $conditionsTechMatAdm = null;

    #[ORM\Column(nullable: true)]
    private ?bool $avisSupHierarchique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaireSupHierarchique = null;

    #[ORM\Column(nullable: true)]
    private ?bool $avisDrh = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaireDrh = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $signatureSupHierarchique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $signatureDrh = null;

    #[ORM\Column(length: 255)]
    private ?string $signatureCollab = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private array $journeeTeletravaillees = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNatureContrat(): ?string
    {
        return $this->natureContrat;
    }

    public function setNatureContrat(string $natureContrat): static
    {
        $this->natureContrat = $natureContrat;

        return $this;
    }

    public function getQuotite(): ?string
    {
        return $this->quotite;
    }

    public function setQuotite(string $quotite): static
    {
        $this->quotite = $quotite;

        return $this;
    }

    public function isConnexionInternet(): ?bool
    {
        return $this->connexionInternet;
    }

    public function setConnexionInternet(bool $connexionInternet): static
    {
        $this->connexionInternet = $connexionInternet;

        return $this;
    }

    public function getAttestationHonneur(): ?string
    {
        return $this->attestationHonneur;
    }

    public function setAttestationHonneur(?string $attestationHonneur): static
    {
        $this->attestationHonneur = $attestationHonneur;

        return $this;
    }

    public function getAttestationAssurance(): ?string
    {
        return $this->attestationAssurance;
    }

    public function setAttestationAssurance(?string $attestationAssurance): static
    {
        $this->attestationAssurance = $attestationAssurance;

        return $this;
    }

    public function isActiviteEligible(): ?bool
    {
        return $this->activiteEligible;
    }

    public function setActiviteEligible(bool $activiteEligible): static
    {
        $this->activiteEligible = $activiteEligible;

        return $this;
    }

    public function isPeriodeEssaiEnCours(): ?bool
    {
        return $this->periodeEssaiEnCours;
    }

    public function setPeriodeEssaiEnCours(bool $periodeEssaiEnCours): static
    {
        $this->periodeEssaiEnCours = $periodeEssaiEnCours;

        return $this;
    }

    public function isAutonomieSuffisante(): ?bool
    {
        return $this->autonomieSuffisante;
    }

    public function setAutonomieSuffisante(bool $autonomieSuffisante): static
    {
        $this->autonomieSuffisante = $autonomieSuffisante;

        return $this;
    }

    public function isConditionsEligibilites(): ?bool
    {
        return $this->conditionsEligibilites;
    }

    public function setConditionsEligibilites(bool $conditionsEligibilites): static
    {
        $this->conditionsEligibilites = $conditionsEligibilites;

        return $this;
    }

    public function isConditionsTechMatAdm(): ?bool
    {
        return $this->conditionsTechMatAdm;
    }

    public function setConditionsTechMatAdm(bool $conditionsTechMatAdm): static
    {
        $this->conditionsTechMatAdm = $conditionsTechMatAdm;

        return $this;
    }

    public function isAvisSupHierarchique(): ?bool
    {
        return $this->avisSupHierarchique;
    }

    public function setAvisSupHierarchique(?bool $avisSupHierarchique): static
    {
        $this->avisSupHierarchique = $avisSupHierarchique;

        return $this;
    }

    public function getCommentaireSupHierarchique(): ?string
    {
        return $this->commentaireSupHierarchique;
    }

    public function setCommentaireSupHierarchique(?string $commentaireSupHierarchique): static
    {
        $this->commentaireSupHierarchique = $commentaireSupHierarchique;

        return $this;
    }

    public function isAvisDrh(): ?bool
    {
        return $this->avisDrh;
    }

    public function setAvisDrh(?bool $avisDrh): static
    {
        $this->avisDrh = $avisDrh;

        return $this;
    }

    public function getCommentaireDrh(): ?string
    {
        return $this->commentaireDrh;
    }

    public function setCommentaireDrh(?string $commentaireDrh): static
    {
        $this->commentaireDrh = $commentaireDrh;

        return $this;
    }

    public function getSignatureSupHierarchique(): ?string
    {
        return $this->signatureSupHierarchique;
    }

    public function setSignatureSupHierarchique(?string $signatureSupHierarchique): static
    {
        $this->signatureSupHierarchique = $signatureSupHierarchique;

        return $this;
    }

    public function getSignatureDrh(): ?string
    {
        return $this->signatureDrh;
    }

    public function setSignatureDrh(?string $signatureDrh): static
    {
        $this->signatureDrh = $signatureDrh;

        return $this;
    }

    public function getSignatureCollab(): ?string
    {
        return $this->signatureCollab;
    }

    public function setSignatureCollab(string $signatureCollab): static
    {
        $this->signatureCollab = $signatureCollab;

        return $this;
    }

    public function getJourneeTeletravaillees(): array
    {
        return $this->journeeTeletravaillees;
    }

    public function setJourneeTeletravaillees(array $journeeTeletravaillees): static
    {
        $this->journeeTeletravaillees = $journeeTeletravaillees;

        return $this;
    }
}
