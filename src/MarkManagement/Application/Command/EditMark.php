<?php

namespace Pb\MarkManagement\Application\Command;

use Pb\MarkManagement\Domain\MarkInterface;
use Pb\MarkManagement\Domain\Student;
use Pb\MarkManagement\Domain\Subject;
use SimpleBus\Message\Name\NamedMessage;

class EditMark implements NamedMessage
{
    /** @var string */
    public $id;

    /** @var float */
    public $value;


    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * The name of this particular type of message.
     *
     * @return string
     */
    public static function messageName()
    {
        return 'edit_mark';
    }
}
