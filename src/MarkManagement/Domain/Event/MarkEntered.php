<?php


namespace Pb\MarkManagement\Domain\Event;


use SimpleBus\Message\Name\NamedMessage;

class MarkEntered implements NamedMessage
{

    /** @inheritdoc */
    public static function messageName(): string
    {
        return 'mark_entered';
    }
}