<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;


use Ramsey\Uuid\UuidInterface;

interface MarkInterface
{
    /**
     * Saisir une note
     * @param UuidInterface $identifier
     * @param float $value
     * @param int $coefficient
     * @param Student $forStudent
     * @param string $label
     * @param string $forDomain
     * @return mixed
     */
    public static  function enter(UuidInterface $identifier, float $value, int $coefficient, string $forStudent, string $label, string $forDomain);

    /**
     * Editer une note
     * @param UuidInterface $identifier
     * @param float $value
     * @return mixed
     */
    public function edit(UuidInterface $identifier, float $value);

}