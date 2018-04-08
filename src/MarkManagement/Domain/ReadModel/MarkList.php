<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain\ReadModel;

// DTO
final class MarkList
{
    /** @var string */
    private $id;

    /** @var float */
    private $value;

    /** @var int */
    private $coefficient;

    /** @var string */
    private $label;

    /** @var string */
    private $student;

    /** @var string */
    private $subject;

    /**
     * MarkList constructor.
     * @param string $id
     * @param float $value
     * @param int $coefficient
     * @param string $label
     * @param string $student
     * @param string $subject
     */
    public function __construct(string $id, float $value, int $coefficient, string $label, string $student, string $subject)
    {
        $this->id = $id;
        $this->value = $value;
        $this->coefficient = $coefficient;
        $this->label = $label;
        $this->student = $student;
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getCoefficient(): int
    {
        return $this->coefficient;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getStudent(): string
    {
        return $this->student;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }
}
