<?php

namespace App\Entity;

use App\Repository\FinvalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FinvalRepository::class)
 */
class Finval
{
   

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Company::class)
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Column(name="companyID")
     */
    private $companyID;

    /**
     * @ORM\Id
     * @ORM\Column(type="date", name="reportDate")
     */
    private $reportedDate;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Indicator::class)
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Column(name="indicatorID")
     */
    private $indicatorID;

    /**
     * @ORM\Column(type="float", name="finValue")
     */
    private $finValue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $errorlog;

    /**
     * @ORM\Column(name="dateCreation", type="datetime", options={"default": "CURRENT_TIMESTAMP"}))
     */
    private $dateCreation;

  

    public function getCompanyID(): ?int
    {
        return $this->companyID;
    }

    public function setCompanyID(int $companyID): self
    {
        $this->companyID = $companyID;

        return $this;
    }

    public function getReportedDate(): ?\DateTimeInterface
    {
        return $this->reportedDate;
    }

    public function setReportedDate(\DateTimeInterface $reportedDate): self
    {
        $this->reportedDate = $reportedDate;

        return $this;
    }

    public function getIndicatorID(): ?Indicator
    {
        return $this->indicatorID;
    }

    public function setIndicatorID(?Indicator $indicatorID): self
    {
        $this->indicatorID = $indicatorID;

        return $this;
    }

    public function getFinValue(): ?float
    {
        return $this->finValue;
    }

    public function setFinValue(float $finValue): self
    {
        $this->finValue = $finValue;

        return $this;
    }

    public function getErrorlog(): ?string
    {
        return $this->errorlog;
    }

    public function setErrorlog(?string $errorlog): self
    {
        $this->errorlog = $errorlog;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
}
