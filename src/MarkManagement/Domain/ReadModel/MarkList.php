<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain\ReadModel;

use Pb\MarkManagement\Domain\Student;

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

    /** @var Student */
    private $student;

    /** @var string */
    private $domain;

    /**
     * MarkList constructor.
     * @param string $id
     * @param float $value
     * @param int $coefficient
     * @param string $label
     * @param Student $student
     * @param string $domain
     */
    public function __construct(string $id, float $value, int $coefficient, string $label, string $student, string $domain)
    {
        $this->id = $id;
        $this->value = $value;
        $this->coefficient = $coefficient;
        $this->label = $label;
        $this->student = $student;
        $this->domain = $domain;
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
     * @return Student
     */
    public function getStudent(): string
    {
        return $this->student;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }



}
