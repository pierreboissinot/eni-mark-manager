<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;


use Ramsey\Uuid\UuidInterface;

final class Student implements StudentInterface
{

    /** @inheritdoc */
    public function enterMarks(
        UuidInterface $identifier,
        string $firstName,
        string $lastName,
        $marks)
    {
        // TODO: Implement enterMarks() method.
    }

    /** @inheritdoc */
    public function signInToExam($exam)
    {
        // TODO: Implement signInToExam() method.
    }

    /** @inheritdoc */
    public function signInToRetake($exam)
    {
        // TODO: Implement signInToRetake() method.
    }
}