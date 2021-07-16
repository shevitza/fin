<?php

namespace App\Entity;

use App\Repository\IndicatorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IndicatorRepository::class)
 */
class Indicator
{
    /**
     * @ORM\Id    
     * @ORM\Column(type="integer", name="indicatorID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="indicatorName")
     */
    private $indicatorName;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $periodic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $formula;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $percentage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndicatorName(): ?string
    {
        return $this->indicatorName;
    }

    public function setIndicatorName(string $indicatorName): self
    {
        $this->indicatorName = $indicatorName;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPeriodic(): ?string
    {
        return $this->periodic;
    }

    public function setPeriodic(?string $periodic): self
    {
        $this->periodic = $periodic;

        return $this;
    }

    public function getFormula(): ?string
    {
        return $this->formula;
    }

    public function setFormula(?string $formula): self
    {
        $this->formula = $formula;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getPercentage(): ?bool
    {
        return $this->percentage;
    }

    public function setPercentage(bool $percentage): self
    {
        $this->percentage = $percentage;

        return $this;
    }
}

