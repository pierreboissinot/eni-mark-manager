<?php


namespace Pb\MarkManagement\Domain\Event;


use SimpleBus\Message\Name\NamedMessage;

class StudentEntered implements NamedMessage
{

    /** @inheritdoc */
    public static function messageName(): string
    {
        return 'student_entered';
    }
}