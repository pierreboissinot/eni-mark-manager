<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;


use Ramsey\Uuid\UuidInterface;

interface StudentInterface
{
    /**
     * @param UuidInterface $identifier
     * @param string $firstName
     * @param string $lastName
     * @param $marks
     * @return mixed
     */
    public function enterMarks(
        UuidInterface $identifier,
        string $firstName,
        string $lastName,
        $marks);

    /**
     * @param $exam
     * @return mixed
     */
    public function signInToExam($exam);

    /**
     * @param $exam
     * @return mixed
     */
    public function signInToRetake($exam);

}