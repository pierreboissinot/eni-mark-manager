<?php

namespace Pb\MarkManagement\Application\Command;


use SimpleBus\Message\Name\NamedMessage;

class EnterStudent implements NamedMessage
{

    public $lastName;
    public $firstName;

    /**
     * The name of this particular type of message.
     *
     * @return string
     */
    public static function messageName()
    {
        return 'enter_student';
    }
}