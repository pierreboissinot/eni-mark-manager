<?php


namespace Pb\MarkManagement\Domain\Event;


use SimpleBus\Message\Name\NamedMessage;

class MarkEdited implements NamedMessage
{
    private $id;
    private $value;

    public function __construct($id, $value)
    {
        $this->id = $id;
        $this->value = $value;
    }

    /** @inheritdoc */
    public static function messageName(): string
    {
        return 'mark_edited';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getValue()
    {
        return $this->value;
    }
}
