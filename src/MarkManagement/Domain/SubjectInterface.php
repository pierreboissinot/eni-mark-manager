<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;

interface SubjectInterface
{

    public static function enter(string $label, DomainInterface $domain);

}
