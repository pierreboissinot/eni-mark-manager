<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;

use Ramsey\Uuid\UuidInterface;

final class Mark implements MarkInterface
{
    /** @var UuidInterface */
    private $id;

    /** @var float */
    private $value;

    /** @var int */
    private $coefficient;

    /** @var string */
    private $label;

    /** @var Student */
    private $student;

    /** @var Subject */
    private $subject;

    private function __construct(UuidInterface $identifier, float $value, int $coefficient, string $student, string $label, Subject $subject)
    {
        if ($value > 20) {
            throw new \OutOfRangeException(
                'A mark cannot exceed 20'
            );
        }
        $this->id = $identifier;
        $this->value = $value;
        $this->coefficient = $coefficient;
        $this->label = $label;
        $this->student = $student;
        $this->subject = $subject;
    }

    /**
     * @inheritdoc
     */
    public static function enter(UuidInterface $identifier, float $value, int $coefficient, string $forStudent, string $label, Subject $forSubject)
    {
        return new self($identifier, $value, $coefficient, $forStudent, $label, $forSubject);
    }

    /**
     * @inheritdoc
     */
    public function edit(UuidInterface $identifier, float $value)
    {
        // TODO: Implement edit() method.
    }
}