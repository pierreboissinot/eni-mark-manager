<?php


namespace Pb\MarkManagement\Application\Command;



use Pb\MarkManagement\Domain\Student;
use SimpleBus\Message\Name\NamedMessage;

class EnterMark implements NamedMessage
{
    /** @var float */
    public $value;

    /** @var Student */
    public $student;

    public $coefficient;

    public $label;

    public $domain;

    /**
     * The name of this particular type of message.
     *
     * @return string
     */
    public static function messageName()
    {
        return 'enter_mark';
    }
}