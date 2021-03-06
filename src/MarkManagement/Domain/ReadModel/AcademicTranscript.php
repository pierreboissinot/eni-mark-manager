<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain\ReadModel;

// DTO
final class AcademicTranscript
{
    /** @var string */
    private $id;

    /** @var float */
    private $value;

    /** @var int */
    private $coefficient;

    /** @var string */
    private $student;

    /** @var string */
    private $subject;

    /** @var string */
    private $domain;

    /**
     * AcademicTranscript constructor.
     * @param string $id
     * @param float $value
     * @param int $coefficient
     * @param string $subject
     */
    public function __construct(string $id, float $value, int $coefficient, string $subject, string $domain)
    {
        $this->id = $id;
        $this->value = $value;
        $this->coefficient = $coefficient;
        $this->subject = $subject;
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
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
	    return $this->domain;
    }
}
