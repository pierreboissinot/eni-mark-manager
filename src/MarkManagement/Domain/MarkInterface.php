<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;

use Ramsey\Uuid\UuidInterface;

interface MarkInterface
{
    /**
     * Saisir une note
     * @param string $identifier
     * @param float $value
     * @param int $coefficient
     * @param StudentInterface $forStudent
     * @param string $label
     * @param SubjectInterface $forSubject
     * @return mixed
     */
    public static function enter(float $value, int $coefficient, StudentInterface $forStudent, string $label, SubjectInterface $forSubject);

    /**
     * Editer une note
     * @param float $value
     * @return mixed
     */
    public function edit(float $value);
}
