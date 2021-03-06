<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class Mark implements MarkInterface
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

    /** @var Subject */
    private $subject;

    private function __construct(string $identifier, float $value, int $coefficient, StudentInterface $student, string $label, SubjectInterface $subject)
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
    public static function enter(float $value, int $coefficient, StudentInterface $forStudent, string $label, SubjectInterface $forSubject)
    {
        $identifier = Uuid::uuid4()->toString();
        return new self($identifier, $value, $coefficient, $forStudent, $label, $forSubject);
    }

    /**
     * @inheritdoc
     */
    public function edit(float $value)
    {
        $this->value = $value;
    }
}
