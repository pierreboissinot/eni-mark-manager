<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain;

interface DomainInterface
{
    public static function enter(string $label);
}