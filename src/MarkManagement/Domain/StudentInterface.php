<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;


use Ramsey\Uuid\UuidInterface;

interface StudentInterface
{
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
