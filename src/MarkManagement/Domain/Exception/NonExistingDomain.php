<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Domain\Exception;


use Throwable;

class NonExistingDomain extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}