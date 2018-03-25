<?php


namespace Pb\MarkManagement\Application\Command;

use SimpleBus\Message\Name\NamedMessage;

class EnterDomain implements NamedMessage
{

    /** @var string */
    public $label;

    /**
     * The name of this particular type of message.
     *
     * @return string
     */
    public static function messageName()
    {
        return 'enter_domain';
    }
}