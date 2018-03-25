<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;


use Ramsey\Uuid\UuidInterface;

interface SubjectInterface
{

    public static function enter(UuidInterface $identifier, string $label, DomainInterface $domain);

}